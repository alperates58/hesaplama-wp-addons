<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class HC_Excel_Planner {

    const OPTION_KEY   = 'hc_planner_data';
    const MAX_FILE_SIZE = 10 * 1024 * 1024;

    public function __construct() {
        add_action( 'wp_ajax_hc_planner_upload',       [ $this, 'ajax_upload' ] );
        add_action( 'wp_ajax_hc_planner_confirm',      [ $this, 'ajax_confirm' ] );
        add_action( 'wp_ajax_hc_planner_create_draft', [ $this, 'ajax_create_draft' ] );
    }

    // ── Storage ───────────────────────────────────────────────────────────────

    public static function get_data() {
        $data = get_option( self::OPTION_KEY, [] );
        return is_array( $data ) ? $data : [];
    }

    private static function save_data( $data ) {
        update_option( self::OPTION_KEY, $data, false );
    }

    // ── AJAX: Upload & Diff ───────────────────────────────────────────────────

    public function ajax_upload() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetersiz yetki.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik hatası.', 400 );
        }

        if ( empty( $_FILES['excel_file'] ) ) {
            wp_send_json_error( 'Dosya bulunamadı.' );
        }

        $file = $_FILES['excel_file'];

        if ( $file['error'] !== UPLOAD_ERR_OK ) {
            wp_send_json_error( 'Yükleme hatası: ' . intval( $file['error'] ) );
        }

        if ( $file['size'] > self::MAX_FILE_SIZE ) {
            wp_send_json_error( 'Dosya çok büyük (max 10 MB).' );
        }

        $ext = strtolower( pathinfo( sanitize_file_name( $file['name'] ), PATHINFO_EXTENSION ) );
        if ( $ext !== 'xlsx' ) {
            wp_send_json_error( 'Sadece .xlsx dosyaları desteklenir.' );
        }

        try {
            $topics = self::parse_xlsx( $file['tmp_name'] );
        } catch ( Exception $e ) {
            wp_send_json_error( 'Excel okuma hatası: ' . $e->getMessage() );
        }

        if ( empty( $topics ) ) {
            wp_send_json_error( "Excel'de geçerli veri bulunamadı." );
        }

        $existing       = self::get_data();
        $existing_topics = $existing['topics'] ?? [];
        $diff            = self::compute_diff( $existing_topics, $topics );

        wp_send_json_success( [
            'total_new'   => count( $topics ),
            'diff'        => $diff,
            'topics_json' => wp_json_encode( $topics, JSON_UNESCAPED_UNICODE ),
        ] );
    }

    // ── AJAX: Confirm Import ──────────────────────────────────────────────────

    public function ajax_confirm() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetersiz yetki.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik hatası.', 400 );
        }

        $topics_json = wp_unslash( $_POST['topics_json'] ?? '' );
        $new_topics  = json_decode( $topics_json, true );

        if ( ! is_array( $new_topics ) ) {
            wp_send_json_error( 'Geçersiz veri.' );
        }

        $modules    = HC_Module_Inventory::get_modules();
        $new_topics = self::match_topics_to_modules( $new_topics, $modules );

        $existing       = self::get_data();
        $existing_topics = $existing['topics'] ?? [];
        $existing_map    = [];

        foreach ( $existing_topics as $t ) {
            $existing_map[ $t['id'] ] = $t;
        }

        foreach ( $new_topics as &$topic ) {
            $prev = $existing_map[ $topic['id'] ] ?? null;
            if ( $prev ) {
                if ( ! empty( $prev['draft_post_id'] ) ) {
                    $topic['draft_post_id'] = $prev['draft_post_id'];
                }
            }
        }
        unset( $topic );

        $data = [
            'imported_at' => current_time( 'mysql' ),
            'topics'      => $new_topics,
        ];

        self::save_data( $data );

        $match_count = count( array_filter( $new_topics, static fn( $t ) => ! empty( $t['module_slug'] ) ) );

        wp_send_json_success( [
            'total'   => count( $new_topics ),
            'matched' => $match_count,
            'message' => count( $new_topics ) . ' konu içe aktarıldı, ' . $match_count . ' modül eşleşmesi bulundu.',
        ] );
    }

    // ── AJAX: Create Draft ────────────────────────────────────────────────────

    public function ajax_create_draft() {
        if ( ! current_user_can( 'edit_posts' ) ) {
            wp_send_json_error( 'Yetersiz yetki.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik hatası.', 400 );
        }

        $topic_id = sanitize_key( wp_unslash( $_POST['topic_id'] ?? '' ) );
        if ( ! $topic_id ) {
            wp_send_json_error( 'Geçersiz konu ID.' );
        }

        $data       = self::get_data();
        $topics     = &$data['topics'];
        $topic_idx  = null;

        foreach ( $topics as $i => $t ) {
            if ( $t['id'] === $topic_id ) {
                $topic_idx = $i;
                break;
            }
        }

        if ( $topic_idx === null ) {
            wp_send_json_error( 'Konu bulunamadı.' );
        }

        $topic = $topics[ $topic_idx ];

        if ( empty( $topic['module_slug'] ) ) {
            wp_send_json_error( 'Bu konuya ait eşleşen modül yok.' );
        }

        if ( ! empty( $topic['draft_post_id'] ) && get_post( $topic['draft_post_id'] ) ) {
            wp_send_json_success( [
                'already_exists' => true,
                'edit_url'       => get_edit_post_link( $topic['draft_post_id'] ),
                'message'        => 'Bu konu için taslak zaten mevcut.',
            ] );
        }

        $cat_ids = self::resolve_categories( $topic['ana_kategori'], $topic['alt_kategori'] );

        $post_id = wp_insert_post( [
            'post_title'    => $topic['baslik'],
            'post_content'  => $topic['shortcode'] . "\n\n",
            'post_status'   => 'draft',
            'post_type'     => 'post',
            'post_category' => $cat_ids,
        ], true );

        if ( is_wp_error( $post_id ) ) {
            wp_send_json_error( $post_id->get_error_message() );
        }

        $topics[ $topic_idx ]['draft_post_id'] = $post_id;
        self::save_data( $data );

        wp_send_json_success( [
            'post_id'  => $post_id,
            'edit_url' => get_edit_post_link( $post_id ),
            'message'  => '"' . $topic['baslik'] . '" taslak olarak kaydedildi.',
        ] );
    }

    // ── XLSX Parser ───────────────────────────────────────────────────────────

    private static function parse_xlsx( $file_path ) {
        if ( ! class_exists( 'ZipArchive' ) ) {
            throw new Exception( 'ZipArchive PHP extension gerekli.' );
        }

        $zip = new ZipArchive();
        if ( $zip->open( $file_path ) !== true ) {
            throw new Exception( 'XLSX dosyası açılamadı.' );
        }

        // Shared strings
        $shared = [];
        $ss_raw = $zip->getFromName( 'xl/sharedStrings.xml' );
        if ( $ss_raw ) {
            $ss = simplexml_load_string( $ss_raw );
            if ( $ss ) {
                foreach ( $ss->si as $si ) {
                    if ( isset( $si->t ) ) {
                        $shared[] = (string) $si->t;
                    } else {
                        $text = '';
                        foreach ( $si->r as $r ) {
                            $text .= (string) $r->t;
                        }
                        $shared[] = $text;
                    }
                }
            }
        }

        // Sheet name → file path via relationships
        $sheet_paths = [];
        $rels_raw = $zip->getFromName( 'xl/_rels/workbook.xml.rels' );
        $rid_to_path = [];
        if ( $rels_raw ) {
            $rels = simplexml_load_string( $rels_raw );
            if ( $rels ) {
                foreach ( $rels->Relationship as $rel ) {
                    $a = $rel->attributes();
                    $rid_to_path[ (string) $a['Id'] ] = 'xl/' . ltrim( (string) $a['Target'], '/' );
                }
            }
        }

        $wb_raw = $zip->getFromName( 'xl/workbook.xml' );
        if ( $wb_raw ) {
            $wb = simplexml_load_string( $wb_raw );
            if ( $wb && isset( $wb->sheets ) ) {
                $ns = $wb->getNamespaces( true );
                $r_ns = $ns['r'] ?? 'http://schemas.openxmlformats.org/officeDocument/2006/relationships';
                foreach ( $wb->sheets->sheet as $sheet ) {
                    $name = (string) $sheet->attributes()['name'];
                    $rid  = (string) $sheet->attributes( $r_ns )['id'];
                    if ( isset( $rid_to_path[ $rid ] ) ) {
                        $sheet_paths[ $name ] = $rid_to_path[ $rid ];
                    }
                }
            }
        }

        // Fallback: if relationships didn't work, try sequential numbering
        if ( empty( $sheet_paths ) && $wb_raw ) {
            $wb = simplexml_load_string( $wb_raw );
            if ( $wb && isset( $wb->sheets ) ) {
                $n = 1;
                foreach ( $wb->sheets->sheet as $sheet ) {
                    $name = (string) $sheet->attributes()['name'];
                    $sheet_paths[ $name ] = "xl/worksheets/sheet{$n}.xml";
                    $n++;
                }
            }
        }

        $topics = [];

        foreach ( $sheet_paths as $sheet_name => $ws_path ) {
            $ws_raw = $zip->getFromName( $ws_path );
            if ( ! $ws_raw ) {
                continue;
            }

            $ws = simplexml_load_string( $ws_raw );
            if ( ! $ws || ! isset( $ws->sheetData ) ) {
                continue;
            }

            $first_row = true;
            foreach ( $ws->sheetData->row as $row ) {
                if ( $first_row ) {
                    $first_row = false;
                    continue;
                }

                $cells = [];
                foreach ( $row->c as $cell ) {
                    $attrs = $cell->attributes();
                    $ref   = (string) $attrs['r'];
                    $type  = (string) ( $attrs['t'] ?? '' );

                    preg_match( '/^([A-Z]+)/', $ref, $m );
                    $col = $m[1] ?? '';
                    if ( ! $col ) {
                        continue;
                    }

                    $value = '';
                    if ( isset( $cell->v ) ) {
                        $raw = (string) $cell->v;
                        if ( $type === 's' ) {
                            $value = $shared[ (int) $raw ] ?? '';
                        } else {
                            $value = $raw;
                        }
                    }

                    $cells[ $col ] = trim( $value );
                }

                $ana    = $cells['A'] ?? '';
                $alt    = $cells['B'] ?? '';
                $baslik = $cells['C'] ?? '';

                if ( ! $ana || ! $baslik ) {
                    continue;
                }

                $topics[] = [
                    'id'            => self::topic_id( $ana, $alt, $baslik ),
                    'ana_kategori'  => $ana,
                    'alt_kategori'  => $alt,
                    'baslik'        => $baslik,
                    'module_slug'   => '',
                    'module_name'   => '',
                    'shortcode'     => '',
                    'draft_post_id' => 0,
                ];
            }
        }

        $zip->close();

        return $topics;
    }

    // ── Matching ──────────────────────────────────────────────────────────────

    private static function match_topics_to_modules( $topics, $modules ) {
        $module_map = [];
        foreach ( $modules as $m ) {
            $key = self::normalize( $m['name'] );
            $module_map[ $key ] = $m;
        }

        foreach ( $topics as &$topic ) {
            $key = self::normalize( $topic['baslik'] );
            if ( isset( $module_map[ $key ] ) ) {
                $m = $module_map[ $key ];
                $topic['module_slug'] = $m['slug'];
                $topic['module_name'] = $m['name'];
                $topic['shortcode']   = $m['shortcode'];
            }
        }
        unset( $topic );

        return $topics;
    }

    // ── Diff ─────────────────────────────────────────────────────────────────

    private static function compute_diff( $existing, $new ) {
        $existing_ids = array_column( $existing, 'id' );
        $new_ids      = array_column( $new, 'id' );

        $added_ids   = array_diff( $new_ids, $existing_ids );
        $removed_ids = array_diff( $existing_ids, $new_ids );

        $added = array_values( array_filter( $new, static fn( $t ) => in_array( $t['id'], $added_ids, true ) ) );
        $removed = array_values( array_filter( $existing, static fn( $t ) => in_array( $t['id'], $removed_ids, true ) ) );

        return [
            'added'     => $added,
            'removed'   => $removed,
            'unchanged' => count( $existing_ids ) - count( $removed_ids ),
        ];
    }

    // ── Category Resolution ───────────────────────────────────────────────────

    private static function resolve_categories( $ana, $alt ) {
        $ids = [];

        $ana_term = term_exists( $ana, 'category' );
        if ( ! $ana_term ) {
            $ana_term = wp_insert_term( $ana, 'category' );
        }

        if ( is_array( $ana_term ) && ! empty( $ana_term['term_id'] ) ) {
            $ana_id = (int) $ana_term['term_id'];
            $ids[]  = $ana_id;

            if ( $alt ) {
                $alt_term = term_exists( $alt, 'category', $ana_id );
                if ( ! $alt_term ) {
                    $alt_term = wp_insert_term( $alt, 'category', [ 'parent' => $ana_id ] );
                }
                if ( is_array( $alt_term ) && ! empty( $alt_term['term_id'] ) ) {
                    $ids[] = (int) $alt_term['term_id'];
                }
            }
        }

        return $ids;
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private static function topic_id( $ana, $alt, $baslik ) {
        $raw = self::normalize( implode( '_', array_filter( [ $ana, $alt, $baslik ] ) ) );
        return preg_replace( '/[^a-z0-9_]+/', '_', $raw );
    }

    private static function normalize( $str ) {
        $str  = function_exists( 'mb_strtolower' ) ? mb_strtolower( $str, 'UTF-8' ) : strtolower( $str );
        $str  = trim( preg_replace( '/\s+/', ' ', $str ) );
        $from = [ 'ş', 'ı', 'ğ', 'ü', 'ö', 'ç', 'İ', 'Ş', 'Ğ', 'Ü', 'Ö', 'Ç' ];
        $to   = [ 's', 'i', 'g', 'u', 'o', 'c', 'i', 's', 'g', 'u', 'o', 'c' ];
        return str_replace( $from, $to, $str );
    }

    private static function group_topics( $topics ) {
        $grouped = [];
        foreach ( $topics as $t ) {
            $ana = $t['ana_kategori'];
            $alt = $t['alt_kategori'] ?: 'Diğer';
            $grouped[ $ana ][ $alt ][] = $t;
        }
        ksort( $grouped, SORT_NATURAL | SORT_FLAG_CASE );
        foreach ( $grouped as &$alts ) {
            ksort( $alts, SORT_NATURAL | SORT_FLAG_CASE );
        }
        return $grouped;
    }

    // ── Render ────────────────────────────────────────────────────────────────

    public static function render_planner_tab() {
        $data    = self::get_data();
        $modules = HC_Module_Inventory::get_modules();
        $nonce   = wp_create_nonce( 'hc_ajax_nonce' );

        $topics = $data['topics'] ?? [];

        if ( ! empty( $topics ) ) {
            $topics = self::match_topics_to_modules( $topics, $modules );
        }

        $total       = count( $topics );
        $match_count = count( array_filter( $topics, static fn( $t ) => ! empty( $t['module_slug'] ) ) );
        $draft_count = count( array_filter( $topics, static fn( $t ) => ! empty( $t['draft_post_id'] ) && get_post( $t['draft_post_id'] ) ) );

        $grouped = self::group_topics( $topics );

        $all_ana    = array_keys( $grouped );
        $filter_ana = sanitize_text_field( wp_unslash( $_GET['planner_ana'] ?? '' ) );
        $filter_alt = sanitize_text_field( wp_unslash( $_GET['planner_alt'] ?? '' ) );
        $only_match = ! empty( $_GET['planner_match'] );

        $imported_at = $data['imported_at'] ?? '';
        ?>

        <div id="hc-planner-wrap" data-nonce="<?php echo esc_attr( $nonce ); ?>">

            <!-- Upload card -->
            <div class="hc-card" id="hc-planner-upload-card">
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h2 style="margin:0 0 4px;">İçerik Planı</h2>
                        <p class="hc-card-copy" style="margin:0;">
                            <?php if ( $imported_at ): ?>
                                Son güncelleme: <strong><?php echo esc_html( $imported_at ); ?></strong> · <?php echo esc_html( $total ); ?> konu
                            <?php else: ?>
                                HESAPLAMA EKLENECEK YAZILAR.xlsx dosyasını yükleyin.
                            <?php endif; ?>
                        </p>
                    </div>
                    <label class="button button-primary" for="hc-planner-file" style="cursor:pointer; display:inline-flex; align-items:center; gap:6px;">
                        <span class="dashicons dashicons-upload" style="margin-top:3px;"></span>
                        <?php echo $total > 0 ? "Excel'i Güncelle" : 'Excel Yükle'; ?>
                    </label>
                    <input type="file" id="hc-planner-file" accept=".xlsx" style="display:none;">
                </div>

                <div id="hc-planner-upload-status" style="margin-top:12px; display:none;"></div>

                <!-- Diff panel -->
                <div id="hc-planner-diff" style="display:none; margin-top:16px;">
                    <div style="padding:16px; background:rgba(99,102,241,0.08); border:1px solid rgba(99,102,241,0.2); border-radius:10px;">
                        <h3 style="margin:0 0 12px; color:var(--hc-text); font-size:15px;">Değişiklik Önizlemesi</h3>
                        <div id="hc-diff-content"></div>
                        <div style="margin-top:16px; display:flex; gap:10px;">
                            <button class="button button-primary" id="hc-planner-confirm-btn">Uygula</button>
                            <button class="button" id="hc-planner-cancel-btn">İptal</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ( $total > 0 ) : ?>

            <!-- Stats -->
            <div class="hc-stats-grid" style="grid-template-columns: repeat(3, 1fr);">
                <div class="hc-stat-card">
                    <span class="hc-stat-label">Toplam Konu</span>
                    <strong class="hc-stat-value"><?php echo esc_html( $total ); ?></strong>
                    <span class="hc-stat-foot"><?php echo esc_html( count( $grouped ) ); ?> ana kategori</span>
                </div>
                <div class="hc-stat-card">
                    <span class="hc-stat-label">Eşleşen Modül</span>
                    <strong class="hc-stat-value" style="color:var(--hc-secondary);"><?php echo esc_html( $match_count ); ?></strong>
                    <span class="hc-stat-foot">Shortcode hazır</span>
                </div>
                <div class="hc-stat-card">
                    <span class="hc-stat-label">Taslak Oluşturuldu</span>
                    <strong class="hc-stat-value" style="color:#4ade80;"><?php echo esc_html( $draft_count ); ?></strong>
                    <span class="hc-stat-foot">WordPress'e kaydedildi</span>
                </div>
            </div>

            <!-- Filter bar -->
            <div class="hc-card" style="padding:14px 18px;">
                <form method="get" class="hc-toolbar-form" style="margin:0;">
                    <input type="hidden" name="page" value="hesaplama-suite-planner">
                    <select name="planner_ana" onchange="this.form.submit()">
                        <option value="">Tüm Ana Kategoriler</option>
                        <?php foreach ( $all_ana as $cat ) : ?>
                            <option value="<?php echo esc_attr( $cat ); ?>" <?php selected( $filter_ana, $cat ); ?>>
                                <?php echo esc_html( $cat ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label style="display:flex; align-items:center; gap:6px; color:var(--hc-text-muted); font-size:13px; cursor:pointer; user-select:none;">
                        <input type="checkbox" name="planner_match" value="1" <?php checked( $only_match ); ?> onchange="this.form.submit()">
                        Sadece Eşleşenler
                    </label>
                    <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-planner' ) ); ?>">Temizle</a>
                </form>
            </div>

            <!-- Grouped table -->
            <?php foreach ( $grouped as $ana_kat => $alt_cats ) : ?>
                <?php
                if ( $filter_ana && $filter_ana !== $ana_kat ) {
                    continue;
                }

                // Check if any visible rows exist
                $has_visible = false;
                foreach ( $alt_cats as $alt_kat => $t_list ) {
                    if ( $filter_alt && $filter_alt !== $alt_kat ) {
                        continue;
                    }
                    foreach ( $t_list as $t ) {
                        if ( ! $only_match || ! empty( $t['module_slug'] ) ) {
                            $has_visible = true;
                            break 2;
                        }
                    }
                }
                if ( ! $has_visible ) {
                    continue;
                }

                $group_all     = array_merge( ...array_values( $alt_cats ) );
                $group_matched = count( array_filter( $group_all, static fn( $t ) => ! empty( $t['module_slug'] ) ) );
                $group_drafted = count( array_filter( $group_all, static fn( $t ) => ! empty( $t['draft_post_id'] ) ) );
                ?>

                <div class="hc-card hc-planner-group">
                    <div class="hc-planner-group-header">
                        <h2 class="hc-planner-group-title">
                            <span class="hc-category-badge"><?php echo esc_html( $ana_kat ); ?></span>
                        </h2>
                        <span class="hc-planner-group-meta">
                            <?php echo count( $group_all ); ?> konu
                            &middot; <span style="color:var(--hc-secondary);"><?php echo $group_matched; ?> eşleşti</span>
                            &middot; <span style="color:#4ade80;"><?php echo $group_drafted; ?> taslak</span>
                        </span>
                    </div>

                    <?php foreach ( $alt_cats as $alt_kat => $t_list ) : ?>
                        <?php
                        if ( $filter_alt && $filter_alt !== $alt_kat ) {
                            continue;
                        }
                        $visible = $only_match
                            ? array_values( array_filter( $t_list, static fn( $t ) => ! empty( $t['module_slug'] ) ) )
                            : $t_list;
                        if ( empty( $visible ) ) {
                            continue;
                        }
                        ?>
                        <div class="hc-planner-subgroup">
                            <div class="hc-planner-subgroup-header">
                                <span><?php echo esc_html( $alt_kat ); ?></span>
                                <span class="hc-planner-subgroup-count"><?php echo count( $visible ); ?></span>
                            </div>
                            <div class="hc-table-wrap">
                                <table class="hc-modules-table">
                                    <thead>
                                        <tr>
                                            <th style="width:36%">Hesaplama Başlığı</th>
                                            <th style="width:28%">Eşleşen Modül</th>
                                            <th style="width:18%">WP Kategori</th>
                                            <th style="width:18%">Durum / İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $visible as $topic ) : ?>
                                            <?php
                                            $has_module = ! empty( $topic['module_slug'] );
                                            $has_draft  = ! empty( $topic['draft_post_id'] ) && get_post( $topic['draft_post_id'] );
                                            $draft_url  = $has_draft ? get_edit_post_link( $topic['draft_post_id'] ) : '';
                                            ?>
                                            <tr data-topic-id="<?php echo esc_attr( $topic['id'] ); ?>">
                                                <td style="font-size:13px;">
                                                    <?php echo esc_html( $topic['baslik'] ); ?>
                                                </td>
                                                <td>
                                                    <?php if ( $has_module ) : ?>
                                                        <code class="hc-shortcode-code"><?php echo esc_html( $topic['shortcode'] ); ?></code>
                                                        <div style="font-size:11px; color:var(--hc-text-muted); margin-top:3px;">
                                                            <?php echo esc_html( $topic['module_name'] ); ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <span style="color:var(--hc-text-muted); font-size:12px;">— yok</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="font-size:12px; color:var(--hc-text-muted);">
                                                    <?php echo esc_html( $topic['ana_kategori'] ); ?>
                                                    <?php if ( $topic['alt_kategori'] ) : ?>
                                                        <span style="display:block; font-size:11px;">↳ <?php echo esc_html( $topic['alt_kategori'] ); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ( $has_draft ) : ?>
                                                        <span class="hc-usage-badge is-used">Taslak ✓</span>
                                                        <a href="<?php echo esc_url( $draft_url ); ?>" target="_blank"
                                                           style="display:block; font-size:11px; margin-top:4px; color:var(--hc-secondary);">
                                                            Düzenle →
                                                        </a>
                                                    <?php elseif ( $has_module ) : ?>
                                                        <button class="button button-primary hc-planner-draft-btn"
                                                                data-topic-id="<?php echo esc_attr( $topic['id'] ); ?>"
                                                                style="font-size:12px; padding:5px 10px; min-height:28px;">
                                                            + Taslak Oluştur
                                                        </button>
                                                        <span class="hc-planner-draft-msg" style="display:none; font-size:11px; margin-top:4px;"></span>
                                                    <?php else : ?>
                                                        <span class="hc-usage-badge is-unused">Modül Yok</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <?php else : ?>
            <div class="hc-empty-state">
                <span class="dashicons dashicons-media-spreadsheet" aria-hidden="true" style="font-size:44px; width:44px; height:44px;"></span>
                <h3>Henüz Excel yüklenmedi</h3>
                <p>HESAPLAMA EKLENECEK YAZILAR.xlsx dosyasını yükleyerek başlayın.</p>
            </div>
            <?php endif; ?>

        </div>

        <script>
        (function () {
            const wrap      = document.getElementById('hc-planner-wrap');
            const nonce     = wrap ? wrap.dataset.nonce : '';
            const ajaxurl   = <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>;

            let pendingTopicsJson = null;

            // ── File input ────────────────────────────────────────────────────
            const fileInput = document.getElementById('hc-planner-file');
            if (fileInput) {
                fileInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (!file) return;
                    uploadExcel(file);
                    this.value = '';
                });
            }

            function uploadExcel(file) {
                const status = document.getElementById('hc-planner-upload-status');
                const diff   = document.getElementById('hc-planner-diff');
                status.style.display = 'block';
                status.innerHTML = '<span style="color:var(--hc-text-muted);">⏳ Yükleniyor ve analiz ediliyor...</span>';
                diff.style.display = 'none';

                const fd = new FormData();
                fd.append('action',     'hc_planner_upload');
                fd.append('nonce',      nonce);
                fd.append('excel_file', file);

                fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(r => r.json())
                    .then(res => {
                        if (!res.success) {
                            status.innerHTML = '<span style="color:#f87171;">✗ ' + escHtml(res.data) + '</span>';
                            return;
                        }
                        status.innerHTML = '<span style="color:#4ade80;">✓ ' + res.data.total_new + ' konu okundu.</span>';
                        pendingTopicsJson = res.data.topics_json;
                        showDiff(res.data.diff, res.data.total_new);
                    })
                    .catch(() => {
                        status.innerHTML = '<span style="color:#f87171;">✗ Bağlantı hatası.</span>';
                    });
            }

            function showDiff(diff, total) {
                const panel   = document.getElementById('hc-planner-diff');
                const content = document.getElementById('hc-diff-content');
                let html = '';

                html += '<div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:12px;">';
                html += '<span style="color:#4ade80; font-size:13px; font-weight:600;">+ ' + diff.added.length + ' yeni konu</span>';
                html += '<span style="color:#f87171; font-size:13px; font-weight:600;">− ' + diff.removed.length + ' kaldırılan konu</span>';
                html += '<span style="color:var(--hc-text-muted); font-size:13px;">' + diff.unchanged + ' değişmedi</span>';
                html += '</div>';

                if (diff.added.length > 0) {
                    html += '<details style="margin-bottom:8px;"><summary style="cursor:pointer; font-size:12px; color:#4ade80; font-weight:600; user-select:none;">Yeni Eklenenler (' + diff.added.length + ')</summary>';
                    html += '<ul style="margin:6px 0 0 16px; list-style:disc; color:var(--hc-text-muted); font-size:12px; line-height:1.8;">';
                    diff.added.slice(0, 50).forEach(t => {
                        html += '<li><strong style="color:var(--hc-text);">' + escHtml(t.ana_kategori) + ' › ' + escHtml(t.alt_kategori) + '</strong> — ' + escHtml(t.baslik) + '</li>';
                    });
                    if (diff.added.length > 50) html += '<li style="color:var(--hc-text-muted);">... ve ' + (diff.added.length - 50) + ' daha</li>';
                    html += '</ul></details>';
                }

                if (diff.removed.length > 0) {
                    html += '<details><summary style="cursor:pointer; font-size:12px; color:#f87171; font-weight:600; user-select:none;">Kaldırılanlar (' + diff.removed.length + ')</summary>';
                    html += '<ul style="margin:6px 0 0 16px; list-style:disc; color:var(--hc-text-muted); font-size:12px; line-height:1.8;">';
                    diff.removed.slice(0, 50).forEach(t => {
                        html += '<li><strong style="color:var(--hc-text);">' + escHtml(t.ana_kategori) + ' › ' + escHtml(t.alt_kategori) + '</strong> — ' + escHtml(t.baslik) + '</li>';
                    });
                    if (diff.removed.length > 50) html += '<li>... ve ' + (diff.removed.length - 50) + ' daha</li>';
                    html += '</ul></details>';
                }

                if (diff.added.length === 0 && diff.removed.length === 0) {
                    html += '<p style="color:var(--hc-text-muted); font-size:13px;">Herhangi bir değişiklik yok. Yine de uygulamak ister misiniz?</p>';
                }

                content.innerHTML = html;
                panel.style.display = 'block';
            }

            // Confirm import
            document.getElementById('hc-planner-confirm-btn')?.addEventListener('click', function () {
                if (!pendingTopicsJson) return;
                this.disabled = true;
                this.textContent = 'Uygulanıyor...';

                const fd = new FormData();
                fd.append('action',      'hc_planner_confirm');
                fd.append('nonce',       nonce);
                fd.append('topics_json', pendingTopicsJson);

                fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(r => r.json())
                    .then(res => {
                        if (!res.success) {
                            alert('Hata: ' + res.data);
                            return;
                        }
                        location.reload();
                    })
                    .catch(() => alert('Bağlantı hatası.'));
            });

            // Cancel import
            document.getElementById('hc-planner-cancel-btn')?.addEventListener('click', function () {
                pendingTopicsJson = null;
                document.getElementById('hc-planner-diff').style.display = 'none';
                document.getElementById('hc-planner-upload-status').style.display = 'none';
            });

            // ── Create draft buttons ──────────────────────────────────────────
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.hc-planner-draft-btn');
                if (!btn) return;

                const topicId = btn.dataset.topicId;
                const msg     = btn.parentElement.querySelector('.hc-planner-draft-msg');

                btn.disabled    = true;
                btn.textContent = '⏳ Oluşturuluyor...';

                const fd = new FormData();
                fd.append('action',   'hc_planner_create_draft');
                fd.append('nonce',    nonce);
                fd.append('topic_id', topicId);

                fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(r => r.json())
                    .then(res => {
                        if (!res.success) {
                            btn.disabled    = false;
                            btn.textContent = '+ Taslak Oluştur';
                            if (msg) {
                                msg.style.display = 'block';
                                msg.style.color   = '#f87171';
                                msg.textContent   = '✗ ' + res.data;
                            }
                            return;
                        }

                        // Replace button with badge + edit link
                        const cell = btn.parentElement;
                        let inner  = '<span class="hc-usage-badge is-used">Taslak ✓</span>';
                        if (res.data.edit_url) {
                            inner += '<a href="' + escHtml(res.data.edit_url) + '" target="_blank" style="display:block; font-size:11px; margin-top:4px; color:var(--hc-secondary);">Düzenle →</a>';
                        }
                        cell.innerHTML = inner;

                        // Update draft stat counter
                        const statEl = document.querySelector('.hc-stats-grid .hc-stat-card:nth-child(3) .hc-stat-value');
                        if (statEl) statEl.textContent = parseInt(statEl.textContent || 0) + 1;
                    })
                    .catch(() => {
                        btn.disabled    = false;
                        btn.textContent = '+ Taslak Oluştur';
                    });
            });

            function escHtml(str) {
                return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
            }
        })();
        </script>
        <?php
    }
}
