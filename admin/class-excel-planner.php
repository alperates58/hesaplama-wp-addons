<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class HC_Excel_Planner {

    const OPTION_KEY   = 'hc_planner_data';
    const MAX_FILE_SIZE = 10 * 1024 * 1024;
    private static $post_lookup_cache = null;

    public function __construct() {
        add_action( 'wp_ajax_hc_planner_upload',       [ $this, 'ajax_upload' ] );
        add_action( 'wp_ajax_hc_planner_confirm',      [ $this, 'ajax_confirm' ] );
        add_action( 'wp_ajax_hc_planner_download',     [ $this, 'ajax_download' ] );
        add_action( 'wp_ajax_hc_planner_create_draft', [ $this, 'ajax_create_draft' ] );
        add_action( 'wp_ajax_hc_planner_ai_analyze',   [ $this, 'ajax_ai_analyze' ] );
    }

    // ── Storage ───────────────────────────────────────────────────────────────

    public static function get_data() {
        $data = get_option( self::OPTION_KEY, [] );
        $data = is_array( $data ) ? $data : [];

        return self::sync_topics_with_modules( $data );
    }

    private static function save_data( $data ) {
        update_option( self::OPTION_KEY, $data, false );
    }

    private static function sync_topics_with_modules( $data ) {
        if ( empty( $data['topics'] ) || ! is_array( $data['topics'] ) ) {
            return $data;
        }

        $topics   = $data['topics'];
        $modules  = HC_Module_Inventory::get_modules();
        $matched  = self::match_topics_to_modules( $topics, $modules );
        $changed  = false;

        foreach ( $matched as $index => $topic ) {
            $prev_slug      = $topics[ $index ]['module_slug'] ?? '';
            $prev_name      = $topics[ $index ]['module_name'] ?? '';
            $prev_shortcode = $topics[ $index ]['shortcode'] ?? '';
            $prev_post_id   = (int) ( $topics[ $index ]['draft_post_id'] ?? 0 );
            $linked_post_id = self::resolve_topic_post_id( $topic, $prev_post_id );

            if ( $linked_post_id !== $prev_post_id ) {
                $matched[ $index ]['draft_post_id'] = $linked_post_id;
                $changed = true;
            }

            if (
                $prev_slug !== ( $topic['module_slug'] ?? '' ) ||
                $prev_name !== ( $topic['module_name'] ?? '' ) ||
                $prev_shortcode !== ( $topic['shortcode'] ?? '' )
            ) {
                $changed = true;
            }
        }

        if ( $changed ) {
            $data['topics'] = $matched;
            update_option( self::OPTION_KEY, $data, false );
        }

        return $changed ? $data : $data;
    }

    private static function get_post_lookup() {
        global $wpdb;

        if ( null !== self::$post_lookup_cache ) {
            return self::$post_lookup_cache;
        }

        $rows = $wpdb->get_results(
            "SELECT ID, post_title, post_name, post_content
             FROM {$wpdb->posts}
             WHERE post_type = 'post'
               AND post_status NOT IN ('trash', 'auto-draft')",
            ARRAY_A
        );

        $lookup = [
            'by_slug'      => [],
            'by_title'     => [],
            'by_shortcode' => [],
        ];

        foreach ( $rows as $row ) {
            $post_id    = (int) ( $row['ID'] ?? 0 );
            $post_title = (string) ( $row['post_title'] ?? '' );
            $post_slug  = (string) ( $row['post_name'] ?? '' );
            $content    = (string) ( $row['post_content'] ?? '' );

            if ( $post_id <= 0 ) {
                continue;
            }

            if ( $post_slug ) {
                $lookup['by_slug'][ $post_slug ][] = $post_id;
            }

            $title_key = self::normalize( $post_title );
            if ( $title_key ) {
                $lookup['by_title'][ $title_key ][] = $post_id;
            }

            preg_match_all( '/\[hc_[a-z0-9_]+\]/i', $content, $matches );
            foreach ( array_values( array_unique( $matches[0] ?? [] ) ) as $shortcode ) {
                $lookup['by_shortcode'][ $shortcode ][] = $post_id;
            }
        }

        self::$post_lookup_cache = $lookup;

        return self::$post_lookup_cache;
    }

    private static function resolve_topic_post_id( $topic, $current_post_id = 0 ) {
        if ( self::post_exists_active( $current_post_id ) ) {
            return (int) $current_post_id;
        }

        $lookup     = self::get_post_lookup();
        $title      = (string) ( $topic['baslik'] ?? '' );
        $slug       = sanitize_title( $title );
        $title_key  = self::normalize( $title );
        $shortcode  = (string) ( $topic['shortcode'] ?? '' );

        $slug_match = self::pick_unique_post_id( $lookup['by_slug'][ $slug ] ?? [] );
        if ( $slug_match ) {
            return $slug_match;
        }

        $title_match = self::pick_unique_post_id( $lookup['by_title'][ $title_key ] ?? [] );
        if ( $title_match ) {
            return $title_match;
        }

        if ( $shortcode ) {
            $shortcode_match = self::pick_unique_post_id( $lookup['by_shortcode'][ $shortcode ] ?? [] );
            if ( $shortcode_match ) {
                return $shortcode_match;
            }
        }

        return 0;
    }

    private static function pick_unique_post_id( $post_ids ) {
        $post_ids = array_values( array_unique( array_filter( array_map( 'intval', (array) $post_ids ) ) ) );

        if ( 1 !== count( $post_ids ) ) {
            return 0;
        }

        return self::post_exists_active( $post_ids[0] ) ? $post_ids[0] : 0;
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
                foreach ( [ 'ai_ana_kategori', 'ai_alt_kategori', 'ai_gerekce', 'ai_guven', 'ai_analyzed_at' ] as $key ) {
                    if ( ! empty( $prev[ $key ] ) ) {
                        $topic[ $key ] = $prev[ $key ];
                    }
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

    public function ajax_download() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Yetersiz yetki.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_die( 'Guvenlik hatasi.', 400 );
        }

        if ( ! class_exists( 'ZipArchive' ) ) {
            wp_die( 'Excel indirme icin ZipArchive gerekli.', 500 );
        }

        $data   = self::get_data();
        $topics = is_array( $data['topics'] ?? null ) ? $data['topics'] : [];
        $rows   = [
            [ 'Ana Kategori', 'Alt Kategori', 'Baslik' ],
        ];

        foreach ( $topics as $topic ) {
            $rows[] = [
                (string) ( $topic['ana_kategori'] ?? '' ),
                (string) ( $topic['alt_kategori'] ?? '' ),
                (string) ( $topic['baslik'] ?? '' ),
            ];
        }

        $tmp_file = wp_tempnam( 'hc-planner-export.xlsx' );
        if ( ! $tmp_file ) {
            wp_die( 'Gecici dosya olusturulamadi.', 500 );
        }

        self::build_xlsx_file( $tmp_file, $rows );

        $filename = 'icerik-plani-' . wp_date( 'Y-m-d-His' ) . '.xlsx';

        nocache_headers();
        header( 'Content-Description: File Transfer' );
        header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
        header( 'Content-Length: ' . filesize( $tmp_file ) );

        readfile( $tmp_file );
        @unlink( $tmp_file );
        exit;
    }

    private static function build_xlsx_file( $file_path, $rows ) {
        $zip = new ZipArchive();
        if ( true !== $zip->open( $file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE ) ) {
            throw new RuntimeException( 'Excel dosyasi olusturulamadi.' );
        }

        $sheet_data     = '';
        $shared_strings = [];
        $shared_index   = [];

        foreach ( array_values( $rows ) as $row_index => $row ) {
            $sheet_data .= '<row r="' . ( $row_index + 1 ) . '">';

            foreach ( array_values( $row ) as $col_index => $value ) {
                $value = (string) $value;
                if ( ! array_key_exists( $value, $shared_index ) ) {
                    $shared_index[ $value ] = count( $shared_strings );
                    $shared_strings[] = $value;
                }

                $cell_ref = self::xlsx_column_label( $col_index ) . ( $row_index + 1 );
                $sheet_data .= '<c r="' . $cell_ref . '" t="s"><v>' . $shared_index[ $value ] . '</v></c>';
            }

            $sheet_data .= '</row>';
        }

        $shared_xml_items = '';
        foreach ( $shared_strings as $string ) {
            $shared_xml_items .= '<si><t>' . self::xlsx_escape( $string ) . '</t></si>';
        }

        $worksheet_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            . '<sheetData>' . $sheet_data . '</sheetData>'
            . '</worksheet>';

        $shared_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<sst xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" count="' . count( $shared_strings ) . '" uniqueCount="' . count( $shared_strings ) . '">'
            . $shared_xml_items
            . '</sst>';

        $workbook_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
            . '<sheets><sheet name="Icerik Plani" sheetId="1" r:id="rId1"/></sheets>'
            . '</workbook>';

        $workbook_rels_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
            . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings" Target="sharedStrings.xml"/>'
            . '</Relationships>';

        $root_rels_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
            . '</Relationships>';

        $content_types_xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
            . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
            . '<Default Extension="xml" ContentType="application/xml"/>'
            . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
            . '<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            . '<Override PartName="/xl/sharedStrings.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sharedStrings+xml"/>'
            . '</Types>';

        $zip->addFromString( '[Content_Types].xml', $content_types_xml );
        $zip->addFromString( '_rels/.rels', $root_rels_xml );
        $zip->addFromString( 'xl/workbook.xml', $workbook_xml );
        $zip->addFromString( 'xl/_rels/workbook.xml.rels', $workbook_rels_xml );
        $zip->addFromString( 'xl/worksheets/sheet1.xml', $worksheet_xml );
        $zip->addFromString( 'xl/sharedStrings.xml', $shared_xml );
        $zip->close();
    }

    private static function xlsx_column_label( $index ) {
        $label = '';
        $index = (int) $index;

        do {
            $label = chr( 65 + ( $index % 26 ) ) . $label;
            $index = (int) floor( $index / 26 ) - 1;
        } while ( $index >= 0 );

        return $label;
    }

    private static function xlsx_escape( $value ) {
        return htmlspecialchars( (string) $value, ENT_XML1 | ENT_QUOTES, 'UTF-8' );
    }

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

        if ( self::post_exists_active( $topic['draft_post_id'] ?? 0 ) ) {
            wp_send_json_success( [
                'already_exists' => true,
                'edit_url'       => get_edit_post_link( $topic['draft_post_id'] ),
                'message'        => 'Bu konu için taslak zaten mevcut.',
            ] );
        }

        $has_module      = ! empty( $topic['module_slug'] );
        $planner_ready   = self::topic_has_planner_category( $topic );
        $ai_ready        = self::topic_has_ai_category( $topic );
        $category_source = ( $has_module || $planner_ready ) ? 'planner' : 'ai';

        if ( ! $has_module && ! $planner_ready && ! $ai_ready ) {
            wp_send_json_error( 'Bu konu için önce AI ile kategori analizi yapın.' );
        }

        $cat_ids = ( $has_module || $planner_ready )
            ? self::resolve_categories( $topic['ana_kategori'], $topic['alt_kategori'] )
            : self::resolve_categories( $topic['ai_ana_kategori'] ?? '', $topic['ai_alt_kategori'] ?? '' );
        $post_name = sanitize_title( $topic['baslik'] );

        // If a post with this slug already exists, link to it instead of creating a duplicate.
        $existing_post = get_page_by_path( $post_name, OBJECT, 'post' );
        if ( $existing_post ) {
            $topics[ $topic_idx ]['draft_post_id'] = $existing_post->ID;
            self::save_data( $data );
            wp_send_json_success( [
                'post_id'  => $existing_post->ID,
                'edit_url' => get_edit_post_link( $existing_post->ID ),
                'message'  => '"' . $topic['baslik'] . '" mevcut yazıya bağlandı.',
            ] );
        }

        $post_id = wp_insert_post( [
            'post_title'    => $topic['baslik'],
            'post_name'     => $post_name,
            'post_content'  => ! empty( $topic['shortcode'] ) ? $topic['shortcode'] . "\n\n" : '',
            'post_status'   => 'draft',
            'post_type'     => 'post',
            'post_category' => $cat_ids,
        ], true );

        if ( is_wp_error( $post_id ) ) {
            wp_send_json_error( $post_id->get_error_message() );
        }

        $topics[ $topic_idx ]['draft_post_id'] = $post_id;
        self::save_data( $data );
        update_post_meta( $post_id, '_hc_planner_category_source', $category_source );

        wp_send_json_success( [
            'post_id'  => $post_id,
            'edit_url' => get_edit_post_link( $post_id ),
            'message'  => '"' . $topic['baslik'] . '" taslak olarak kaydedildi.',
        ] );
    }

    // ── XLSX Parser ───────────────────────────────────────────────────────────

    public function ajax_ai_analyze() {
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

        $data      = self::get_data();
        $topics    = &$data['topics'];
        $topic_idx = null;

        foreach ( $topics as $i => $topic_row ) {
            if ( $topic_row['id'] === $topic_id ) {
                $topic_idx = $i;
                break;
            }
        }

        if ( null === $topic_idx ) {
            wp_send_json_error( 'Konu bulunamadı.' );
        }

        $provider = new HC_AI_Provider();
        if ( ! $provider->is_feature_enabled( 'writer_tab' ) ) {
            wp_send_json_error( 'AI içerik araçları kapalı.' );
        }

        $topic   = $topics[ $topic_idx ];
        $catalog = self::get_site_category_catalog();

        if ( empty( $catalog['tree'] ) ) {
            wp_send_json_error( 'Sitede analiz edilecek kategori bulunamadı.' );
        }

        $result = $provider->generate( self::build_category_analysis_prompt( $topic, $catalog ) );
        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        $parsed = self::parse_ai_category_response( $result );
        if ( is_wp_error( $parsed ) ) {
            wp_send_json_error( $parsed->get_error_message() );
        }

        $validated = self::validate_category_suggestion( $parsed['ana_kategori'] ?? '', $parsed['alt_kategori'] ?? '', $catalog );
        if ( empty( $validated['ana_kategori'] ) ) {
            wp_send_json_error( 'AI uygun bir kategori seçemedi.' );
        }

        $topics[ $topic_idx ]['ai_ana_kategori'] = $validated['ana_kategori'];
        $topics[ $topic_idx ]['ai_alt_kategori'] = $validated['alt_kategori'];
        $topics[ $topic_idx ]['ai_gerekce']      = sanitize_text_field( $parsed['gerekce'] ?? '' );
        $topics[ $topic_idx ]['ai_guven']        = min( 100, max( 0, (int) ( $parsed['guven'] ?? 0 ) ) );
        $topics[ $topic_idx ]['ai_analyzed_at']  = current_time( 'mysql' );

        self::save_data( $data );

        wp_send_json_success(
            [
                'ana_kategori' => $topics[ $topic_idx ]['ai_ana_kategori'],
                'alt_kategori' => $topics[ $topic_idx ]['ai_alt_kategori'],
                'gerekce'      => $topics[ $topic_idx ]['ai_gerekce'],
                'guven'        => $topics[ $topic_idx ]['ai_guven'],
                'label'        => self::format_topic_category_label( $topics[ $topic_idx ], true ),
            ]
        );
    }

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
                    'ai_ana_kategori' => '',
                    'ai_alt_kategori' => '',
                    'ai_gerekce'      => '',
                    'ai_guven'        => 0,
                    'ai_analyzed_at'  => '',
                ];
            }
        }

        $zip->close();

        return $topics;
    }

    // ── Matching ──────────────────────────────────────────────────────────────

    private static function match_topics_to_modules( $topics, $modules ) {
        $module_map         = [];
        $module_compact_map = [];
        $module_tokens      = [];
        $used_modules       = [];

        foreach ( $modules as $m ) {
            $key                            = self::normalize( $m['name'] );
            $compact                        = self::normalize_compact( $m['name'] );
            $module_map[ $key ][]           = $m;
            $module_compact_map[ $compact ][] = $m;
            $module_tokens[]                = [
                'module'  => $m,
                'tokens'  => self::tokenize_compact( $compact ),
                'compact' => $compact,
            ];
        }

        foreach ( $topics as &$topic ) {
            $topic['module_slug'] = '';
            $topic['module_name'] = '';
            $topic['shortcode']   = '';
        }
        unset( $topic );

        foreach ( $topics as &$topic ) {
            $key     = self::normalize( $topic['baslik'] );
            $compact = self::normalize_compact( $topic['baslik'] );
            $match   = self::pick_unused_module( $module_map[ $key ] ?? [], $used_modules );

            if ( ! $match && $compact ) {
                $match = self::pick_unused_module( $module_compact_map[ $compact ] ?? [], $used_modules );
            }

            if ( $match ) {
                self::apply_module_match( $topic, $match, $used_modules );
            }
        }
        unset( $topic );

        foreach ( $topics as &$topic ) {
            if ( ! empty( $topic['module_slug'] ) ) {
                continue;
            }

            $compact = self::normalize_compact( $topic['baslik'] );
            $match   = self::find_best_module_match( $compact, $module_tokens, $used_modules );

            if ( $match ) {
                self::apply_module_match( $topic, $match, $used_modules );
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

    private static function post_exists_active( $post_id ) {
        if ( ! $post_id ) return false;
        $post = get_post( (int) $post_id );
        return $post && $post->post_status !== 'trash';
    }

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

    private static function normalize_compact( $str ) {
        $str = self::normalize( $str );
        $str = preg_replace( '/\([^)]*\)/u', ' ', $str );
        $str = preg_replace( '/\b(hesaplama|hesaplayici|hesap makinesi|testi|skoru|orani|hesabi)\b/u', ' ', $str );
        $str = preg_replace( '/[^a-z0-9]+/u', ' ', $str );

        return trim( preg_replace( '/\s+/', ' ', $str ) );
    }

    private static function tokenize_compact( $compact ) {
        if ( ! $compact ) {
            return [];
        }

        return array_values( array_filter( explode( ' ', $compact ) ) );
    }

    private static function find_best_module_match( $topic_compact, $module_tokens, $used_modules = [] ) {
        $topic_tokens = self::tokenize_compact( $topic_compact );
        if ( empty( $topic_tokens ) ) {
            return null;
        }

        $best         = null;
        $best_score   = 0;
        $second_score = 0;

        foreach ( $module_tokens as $candidate ) {
            if ( ! empty( $used_modules[ $candidate['module']['slug'] ] ) ) {
                continue;
            }

            if ( empty( $candidate['tokens'] ) ) {
                continue;
            }

            $intersection = array_intersect( $topic_tokens, $candidate['tokens'] );
            $shared_count  = count( $intersection );
            $union        = array_unique( array_merge( $topic_tokens, $candidate['tokens'] ) );
            $jaccard      = empty( $union ) ? 0 : count( $intersection ) / count( $union );
            $coverage     = count( $intersection ) / max( 1, min( count( $topic_tokens ), count( $candidate['tokens'] ) ) );
            $score        = max( $jaccard, $coverage );

            if ( $shared_count < 2 ) {
                continue;
            }

            if ( $score > $best_score ) {
                $second_score = $best_score;
                $best_score = $score;
                $best       = $candidate['module'];
            } elseif ( $score > $second_score ) {
                $second_score = $score;
            }
        }

        if ( ! $best ) {
            return null;
        }

        if ( $best_score < 0.9 ) {
            return null;
        }

        if ( ( $best_score - $second_score ) < 0.08 ) {
            return null;
        }

        return $best;
    }

    private static function pick_unused_module( $candidates, $used_modules ) {
        foreach ( (array) $candidates as $candidate ) {
            if ( empty( $used_modules[ $candidate['slug'] ] ) ) {
                return $candidate;
            }
        }

        return null;
    }

    private static function apply_module_match( &$topic, $module, &$used_modules ) {
        $topic['module_slug'] = $module['slug'];
        $topic['module_name'] = $module['name'];
        $topic['shortcode']   = $module['shortcode'];
        $used_modules[ $module['slug'] ] = true;
    }

    private static function topic_has_ai_category( $topic ) {
        return ! empty( $topic['ai_ana_kategori'] );
    }

    private static function topic_has_planner_category( $topic ) {
        return ! empty( $topic['ana_kategori'] );
    }

    private static function topic_has_linked_post( $topic ) {
        return self::post_exists_active( $topic['draft_post_id'] ?? 0 );
    }

    private static function topic_is_ready_for_draft( $topic ) {
        return ! self::topic_has_linked_post( $topic ) && ! empty( $topic['module_slug'] );
    }

    private static function topic_is_unmatched( $topic ) {
        return empty( $topic['module_slug'] );
    }

    private static function get_site_category_catalog() {
        $choices = HC_Module_Inventory::get_wordpress_category_choices();
        $tree    = [];

        foreach ( $choices as $choice ) {
            if ( 0 === (int) $choice['depth'] ) {
                if ( ! isset( $tree[ $choice['name'] ] ) ) {
                    $tree[ $choice['name'] ] = [];
                }
                continue;
            }

            $tree[ $choice['parent'] ][] = $choice['child'];
        }

        foreach ( $tree as $parent => $children ) {
            $tree[ $parent ] = array_values( array_unique( array_filter( $children ) ) );
        }

        ksort( $tree, SORT_NATURAL | SORT_FLAG_CASE );

        return [
            'tree'    => $tree,
            'choices' => $choices,
        ];
    }

    private static function build_category_analysis_prompt( $topic, $catalog ) {
        $lines = [];
        foreach ( $catalog['tree'] as $parent => $children ) {
            $lines[] = '- ' . $parent . ( $children ? ' => ' . implode( ', ', $children ) : '' );
        }

        return implode(
            "\n",
            [
                'Asagidaki baslik icin sitedeki mevcut WordPress kategorilerinden en uygun ana kategori ve varsa alt kategori sec.',
                'Sadece verilen kategori agacini kullan. Yeni kategori uydurma.',
                'Alt kategori uygun degilse bos birak.',
                'Yanit sadece JSON olsun.',
                '{\"ana_kategori\":\"\",\"alt_kategori\":\"\",\"gerekce\":\"\",\"guven\":0}',
                '',
                'Baslik: ' . $topic['baslik'],
                'Icerik plani ana kategori: ' . ( $topic['ana_kategori'] ?? '' ),
                'Icerik plani alt kategori: ' . ( $topic['alt_kategori'] ?? '' ),
                '',
                'Kategori agaci:',
                implode( "\n", $lines ),
            ]
        );
    }

    private static function parse_ai_category_response( $result ) {
        $json = json_decode( trim( (string) $result ), true );

        if ( ! is_array( $json ) && preg_match( '/\{.*\}/s', (string) $result, $matches ) ) {
            $json = json_decode( $matches[0], true );
        }

        if ( ! is_array( $json ) ) {
            return new WP_Error( 'bad_ai_response', 'AI yaniti cozumlenemedi.' );
        }

        return $json;
    }

    private static function validate_category_suggestion( $ana, $alt, $catalog ) {
        $ana = self::normalize( sanitize_text_field( (string) $ana ) );
        $alt = self::normalize( sanitize_text_field( (string) $alt ) );

        $matched_parent = '';
        foreach ( array_keys( $catalog['tree'] ) as $parent ) {
            if ( self::normalize( $parent ) === $ana ) {
                $matched_parent = $parent;
                break;
            }
        }

        if ( ! $matched_parent ) {
            return [];
        }

        $matched_child = '';
        if ( $alt ) {
            foreach ( $catalog['tree'][ $matched_parent ] as $child ) {
                if ( self::normalize( $child ) === $alt ) {
                    $matched_child = $child;
                    break;
                }
            }
        }

        return [
            'ana_kategori' => $matched_parent,
            'alt_kategori' => $matched_child,
        ];
    }

    private static function format_topic_category_label( $topic, $prefer_ai = false ) {
        $ana = $prefer_ai && ! empty( $topic['ai_ana_kategori'] ) ? $topic['ai_ana_kategori'] : ( $topic['ana_kategori'] ?? '' );
        $alt = $prefer_ai && ! empty( $topic['ai_alt_kategori'] ) ? $topic['ai_alt_kategori'] : ( $topic['alt_kategori'] ?? '' );

        if ( ! $ana ) {
            return '';
        }

        return $alt ? $ana . ' › ' . $alt : $ana;
    }

    private static function count_unique_matched_modules( $topics ) {
        $matched = array_filter(
            array_map(
                static function ( $topic ) {
                    return $topic['module_slug'] ?? '';
                },
                $topics
            )
        );

        return count( array_unique( $matched ) );
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
        $match_count = self::count_unique_matched_modules( $topics );
        $matched_topic_count = count( array_filter( $topics, static fn( $t ) => ! empty( $t['module_slug'] ) ) );
        $draft_count = count( array_filter( $topics, static fn( $t ) => self::topic_has_linked_post( $t ) ) );
        $ready_draft_count = count( array_filter( $topics, static fn( $t ) => self::topic_is_ready_for_draft( $t ) ) );
        $unmatched_count = count( array_filter( $topics, static fn( $t ) => self::topic_is_unmatched( $t ) ) );

        $grouped = self::group_topics( $topics );

        $all_ana    = array_keys( $grouped );
        $filter_ana = sanitize_text_field( wp_unslash( $_GET['planner_ana'] ?? '' ) );
        $filter_alt = sanitize_text_field( wp_unslash( $_GET['planner_alt'] ?? '' ) );
        $planner_view = sanitize_text_field( wp_unslash( $_GET['planner_view'] ?? 'queue' ) );
        if ( ! in_array( $planner_view, [ 'queue', 'all' ], true ) ) {
            $planner_view = 'queue';
        }
        $only_match     = ! empty( $_GET['planner_match'] );
        $only_unmatched = ! empty( $_GET['planner_unmatched'] );

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
                    <?php if ( $total > 0 ) : ?>
                        <a class="button" href="<?php echo esc_url( add_query_arg( [ 'action' => 'hc_planner_download', 'nonce' => $nonce ], admin_url( 'admin-ajax.php' ) ) ); ?>" style="display:inline-flex; align-items:center; gap:6px;">
                            <span class="dashicons dashicons-download" style="margin-top:3px;"></span>
                            Excel'i Indir
                        </a>
                    <?php endif; ?>
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
                    <span class="hc-stat-foot"><?php echo esc_html( $matched_topic_count ); ?> konuda shortcode hazir</span>
                </div>
                <div class="hc-stat-card">
                    <span class="hc-stat-label">Bagli Yazi</span>
                    <strong class="hc-stat-value" style="color:#4ade80;"><?php echo esc_html( $draft_count ); ?></strong>
                    <span class="hc-stat-foot">Taslak, yayinda veya bekleyen dahil</span>
                </div>
            </div>

            <div class="hc-card" style="margin-top:0; margin-bottom:20px;">
                <p style="margin:0; color:var(--hc-text-muted);">
                    Buradaki "Eslesen Modul" sayisi benzersiz modul sayisidir; ayni modul birden fazla konuya atanmaz. "Bagli Yazi" sadece icerik planindaki konulara baglanmis, copte olmayan yazilari sayar; sitedeki tum yazilarin toplami degildir.
                </p>
            </div>

            <div class="hc-card" style="margin-top:0; margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap;">
                    <div>
                        <h3 style="margin:0 0 4px;">Gorunum</h3>
                        <p style="margin:0; color:var(--hc-text-muted);">
                            Varsayilan ekran taslak olusturma kuyrugunu gosterir. Tum Excel listesini sadece istediginizde acabilirsiniz.
                        </p>
                    </div>
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <?php if ( 'queue' === $planner_view ) : ?>
                            <span class="button button-primary" style="pointer-events:none;">Taslak Kuyrugu (<?php echo esc_html( $ready_draft_count ); ?>)</span>
                            <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-planner&planner_view=all' ) ); ?>">Tum Excel Listesi</a>
                        <?php else : ?>
                            <a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-planner' ) ); ?>">Taslak Kuyrugu (<?php echo esc_html( $ready_draft_count ); ?>)</a>
                            <span class="button" style="pointer-events:none;">Tum Excel Listesi</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Filter + bulk action bar -->
            <div class="hc-card" style="padding:14px 18px; position:sticky; top:32px; z-index:20;">
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                    <form method="get" class="hc-toolbar-form" style="margin:0;">
                        <input type="hidden" name="page" value="hesaplama-suite-planner">
                        <input type="hidden" name="planner_view" value="<?php echo esc_attr( $planner_view ); ?>">
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
                            Modulu Eslesenler
                        </label>
                        <label style="display:flex; align-items:center; gap:6px; color:var(--hc-text-muted); font-size:13px; cursor:pointer; user-select:none;">
                            <input type="checkbox" name="planner_unmatched" value="1" <?php checked( $only_unmatched ); ?> onchange="this.form.submit()">
                            Modul Eslesmeyenler (<?php echo esc_html( $unmatched_count ); ?>)
                        </label>
                        <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-planner' . ( 'all' === $planner_view ? '&planner_view=all' : '' ) ) ); ?>">Temizle</a>
                    </form>

                    <!-- Bulk actions -->
                    <div id="hc-bulk-bar" style="display:flex; align-items:center; gap:10px;">
                        <label style="display:flex; align-items:center; gap:6px; font-size:13px; color:var(--hc-text-muted); cursor:pointer; user-select:none;">
                            <input type="checkbox" id="hc-select-all-eligible">
                            <span id="hc-select-all-label">Tümünü Seç</span>
                        </label>
                        <button class="button button-primary" id="hc-bulk-draft-btn" disabled
                                style="display:inline-flex; align-items:center; gap:6px;">
                            <span class="dashicons dashicons-welcome-write-blog" style="margin-top:2px; font-size:16px; width:16px; height:16px;"></span>
                            <span id="hc-bulk-btn-label">Toplu Taslak Oluştur</span>
                        </button>
                        <span id="hc-bulk-progress" style="display:none; font-size:12px; color:var(--hc-text-muted);"></span>
                    </div>
                </div>
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
                        $topic_visible = true;

                        if ( 'queue' === $planner_view ) {
                            $topic_visible = $only_unmatched
                                ? ( ! self::topic_has_linked_post( $t ) && self::topic_is_unmatched( $t ) )
                                : self::topic_is_ready_for_draft( $t );
                        }

                        if ( $topic_visible && $only_match && empty( $t['module_slug'] ) ) {
                            $topic_visible = false;
                        }

                        if ( $topic_visible && $only_unmatched && ! empty( $t['module_slug'] ) ) {
                            $topic_visible = false;
                        }

                        if ( $topic_visible ) {
                            $has_visible = true;
                            break 2;
                        }
                    }
                }
                if ( ! $has_visible ) {
                    continue;
                }

                $group_all     = array_merge( ...array_values( $alt_cats ) );
                $group_matched = self::count_unique_matched_modules( $group_all );
                $group_drafted = count( array_filter( $group_all, static fn( $t ) => self::post_exists_active( $t['draft_post_id'] ?? 0 ) ) );
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
                        $visible = array_values(
                            array_filter(
                                $t_list,
                                static function ( $t ) use ( $only_match, $only_unmatched, $planner_view ) {
                                    if ( 'queue' === $planner_view ) {
                                        if ( $only_unmatched ) {
                                            return ! self::topic_has_linked_post( $t ) && self::topic_is_unmatched( $t );
                                        }

                                        if ( ! self::topic_is_ready_for_draft( $t ) ) {
                                            return false;
                                        }
                                    }

                                    if ( $only_match && empty( $t['module_slug'] ) ) {
                                        return false;
                                    }

                                    if ( $only_unmatched && ! empty( $t['module_slug'] ) ) {
                                        return false;
                                    }

                                    return true;
                                }
                            )
                        );
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
                                            <th style="width:3%;"></th>
                                            <th style="width:34%">Hesaplama Başlığı</th>
                                            <th style="width:27%">Eşleşen Modül</th>
                                            <th style="width:17%">WP Kategori</th>
                                            <th style="width:19%">Durum / İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $visible as $topic ) : ?>
                                            <?php
                                            $has_module = ! empty( $topic['module_slug'] );
                                            $has_draft  = self::post_exists_active( $topic['draft_post_id'] ?? 0 );
                                            $draft_url  = $has_draft ? get_edit_post_link( $topic['draft_post_id'] ) : '';
                                            $planner_ready = self::topic_has_planner_category( $topic );
                                            $ai_ready      = self::topic_has_ai_category( $topic );
                                            $eligible      = ( $has_module || $planner_ready || $ai_ready ) && ! $has_draft;
                                            ?>
                                            <tr data-topic-id="<?php echo esc_attr( $topic['id'] ); ?>">
                                                <td style="text-align:center; padding:12px 8px;">
                                                    <?php if ( $eligible ) : ?>
                                                        <input type="checkbox" class="hc-topic-cb"
                                                               value="<?php echo esc_attr( $topic['id'] ); ?>"
                                                               style="width:15px; height:15px; cursor:pointer; accent-color:var(--hc-primary);">
                                                    <?php endif; ?>
                                                </td>
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
                                                        <span class="hc-usage-badge is-unused">Modül Yok</span>
                                                        <button class="button hc-planner-ai-btn"
                                                                data-topic-id="<?php echo esc_attr( $topic['id'] ); ?>"
                                                                style="display:block; margin-top:6px; font-size:12px; padding:5px 10px; min-height:28px;">
                                                            AI ile Analiz Et
                                                        </button>
                                                        <span class="hc-planner-ai-msg" style="display:none; font-size:11px; margin-top:4px;"></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="font-size:12px; color:var(--hc-text-muted);" class="hc-topic-category-cell">
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
                                                    <?php elseif ( $has_module || $planner_ready || $ai_ready ) : ?>
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

            // ── Checkbox & bulk selection ─────────────────────────────────────
            const selectAllCb  = document.getElementById('hc-select-all-eligible');
            const selectLabel  = document.getElementById('hc-select-all-label');
            const bulkBtn      = document.getElementById('hc-bulk-draft-btn');
            const bulkBtnLabel = document.getElementById('hc-bulk-btn-label');
            const bulkProgress = document.getElementById('hc-bulk-progress');

            function getEligibleCbs() {
                return Array.from(document.querySelectorAll('.hc-topic-cb'));
            }

            function getCheckedCbs() {
                return getEligibleCbs().filter(cb => cb.checked);
            }

            function updateBulkBar() {
                const checked   = getCheckedCbs().length;
                const eligible  = getEligibleCbs().length;
                bulkBtn.disabled = checked === 0;
                bulkBtnLabel.textContent = checked > 0
                    ? `Toplu Taslak Oluştur (${checked})`
                    : 'Toplu Taslak Oluştur';
                if (selectAllCb) {
                    selectAllCb.checked       = eligible > 0 && checked === eligible;
                    selectAllCb.indeterminate = checked > 0 && checked < eligible;
                    selectLabel.textContent   = checked === eligible && eligible > 0
                        ? 'Tümünü Kaldır'
                        : 'Tümünü Seç';
                }
            }

            if (selectAllCb) {
                selectAllCb.addEventListener('change', function () {
                    const state = this.checked;
                    getEligibleCbs().forEach(cb => { cb.checked = state; });
                    updateBulkBar();
                });
            }

            document.addEventListener('change', function (e) {
                if (e.target.classList.contains('hc-topic-cb')) {
                    updateBulkBar();
                }
            });

            updateBulkBar();

            // ── Bulk create ───────────────────────────────────────────────────
            if (bulkBtn) {
                bulkBtn.addEventListener('click', async function () {
                    const ids = getCheckedCbs().map(cb => cb.value);
                    if (!ids.length) return;

                    bulkBtn.disabled = true;
                    let done = 0, failed = 0;
                    bulkProgress.style.display = 'inline';
                    bulkProgress.textContent   = `0 / ${ids.length} tamamlandı`;

                    for (const topicId of ids) {
                        const result = await createDraft(topicId);
                        if (result.success) {
                            done++;
                            markRowDrafted(topicId, result.data.edit_url);
                            // Uncheck the row's checkbox (it's removed, but update counter anyway)
                        } else {
                            failed++;
                        }
                        bulkProgress.textContent = `${done + failed} / ${ids.length} — ${done} taslak oluşturuldu${failed ? ', ' + failed + ' hata' : ''}`;
                    }

                    bulkProgress.style.color = failed > 0 ? '#f87171' : '#4ade80';
                    bulkBtnLabel.textContent = 'Toplu Taslak Oluştur';
                    updateBulkBar();

                    // Update stat counter
                    const statEl = document.querySelector('.hc-stats-grid .hc-stat-card:nth-child(3) .hc-stat-value');
                    if (statEl) statEl.textContent = parseInt(statEl.textContent || 0) + done;
                });
            }

            // ── Single create draft ───────────────────────────────────────────
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.hc-planner-draft-btn');
                if (!btn) return;

                const topicId = btn.dataset.topicId;
                const msg     = btn.parentElement.querySelector('.hc-planner-draft-msg');

                btn.disabled    = true;
                btn.textContent = '⏳ Oluşturuluyor...';

                createDraft(topicId).then(res => {
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
                    markRowDrafted(topicId, res.data.edit_url);
                    const statEl = document.querySelector('.hc-stats-grid .hc-stat-card:nth-child(3) .hc-stat-value');
                    if (statEl) statEl.textContent = parseInt(statEl.textContent || 0) + 1;
                });
            });

            // ── Shared helpers ────────────────────────────────────────────────
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.hc-planner-ai-btn');
                if (!btn) return;

                const topicId = btn.dataset.topicId;
                const msg = btn.parentElement.querySelector('.hc-planner-ai-msg');

                btn.disabled = true;
                btn.textContent = 'Analiz ediliyor...';
                if (msg) {
                    msg.style.display = 'none';
                    msg.textContent = '';
                }

                analyzeTopic(topicId).then(res => {
                    if (!res.success) {
                        btn.disabled = false;
                        btn.textContent = 'AI ile Analiz Et';
                        if (msg) {
                            msg.style.display = 'block';
                            msg.style.color = '#f87171';
                            msg.textContent = '× ' + res.data;
                        }
                        return;
                    }

                    if (msg) {
                        msg.style.display = 'block';
                        msg.style.color = '#4ade80';
                        msg.textContent = '✓ ' + (res.data.label || 'Kategori bulundu');
                    }

                    setTimeout(() => window.location.reload(), 700);
                });
            });

            function createDraft(topicId) {
                const fd = new FormData();
                fd.append('action',   'hc_planner_create_draft');
                fd.append('nonce',    nonce);
                fd.append('topic_id', topicId);
                return fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(r => r.json())
                    .catch(() => ({ success: false, data: 'Bağlantı hatası.' }));
            }

            function analyzeTopic(topicId) {
                const fd = new FormData();
                fd.append('action', 'hc_planner_ai_analyze');
                fd.append('nonce', nonce);
                fd.append('topic_id', topicId);
                return fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(r => r.json())
                    .catch(() => ({ success: false, data: 'Bağlantı hatası.' }));
            }

            function markRowDrafted(topicId, editUrl) {
                const row = document.querySelector(`tr[data-topic-id="${topicId}"]`);
                if (!row) return;

                // Clear checkbox cell
                const cbCell = row.querySelector('td:first-child');
                if (cbCell) cbCell.innerHTML = '';

                // Update action cell
                const actionCell = row.querySelector('td:last-child');
                if (actionCell) {
                    let html = '<span class="hc-usage-badge is-used">Taslak ✓</span>';
                    if (editUrl) {
                        html += '<a href="' + escHtml(editUrl) + '" target="_blank" style="display:block; font-size:11px; margin-top:4px; color:var(--hc-secondary);">Düzenle →</a>';
                    }
                    actionCell.innerHTML = html;
                }
                updateBulkBar();
            }

            function escHtml(str) {
                return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
            }
        })();
        </script>
        <?php
    }
}
