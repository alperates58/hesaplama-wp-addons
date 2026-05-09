<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class HC_Module_Inventory {

    const OPTION_KEY = 'hc_module_catalog';
    private static $module_index_cache = null;
    private static $module_usage_cache = null;

    public static function get_publisher_name() {
        return 'Alper ATEŞ';
    }

    public static function get_catalog_settings() {
        $defaults = [
            'categories'        => [],
            'module_categories' => [],
        ];

        $settings = get_option( self::OPTION_KEY, [] );

        if ( ! is_array( $settings ) ) {
            $settings = [];
        }

        return wp_parse_args( $settings, $defaults );
    }

    public static function save_catalog_settings( $request ) {
        $settings          = self::get_catalog_settings();
        $categories_input  = sanitize_textarea_field( wp_unslash( $request['hc_categories'] ?? '' ) );
        $module_categories = isset( $request['hc_module_category'] ) ? (array) wp_unslash( $request['hc_module_category'] ) : [];
        $all_modules       = self::get_modules();
        $allowed_slugs     = wp_list_pluck( $all_modules, 'slug' );

        $categories = preg_split( '/[\r\n,]+/', $categories_input );
        $categories = array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $categories ) );
        $categories = array_values( array_unique( $categories ) );

        $saved_assignments = isset( $settings['module_categories'] ) && is_array( $settings['module_categories'] )
            ? $settings['module_categories']
            : [];

        foreach ( $saved_assignments as $slug => $category ) {
            if ( ! in_array( $slug, $allowed_slugs, true ) ) {
                unset( $saved_assignments[ $slug ] );
                continue;
            }

            $saved_assignments[ $slug ] = self::sanitize_category( $category );
        }

        foreach ( $module_categories as $slug => $category ) {
            $slug     = sanitize_key( $slug );
            $category = self::sanitize_category( $category );

            if ( ! in_array( $slug, $allowed_slugs, true ) ) {
                continue;
            }

            if ( ! $category ) {
                unset( $saved_assignments[ $slug ] );
                continue;
            }

            if ( ! in_array( $category, $categories, true ) ) {
                $categories[] = $category;
            }

            $saved_assignments[ $slug ] = $category;
        }

        sort( $categories, SORT_NATURAL | SORT_FLAG_CASE );

        $settings['categories']        = $categories;
        $settings['module_categories'] = $saved_assignments;

        update_option( self::OPTION_KEY, $settings, false );
    }

    public static function get_modules( $args = [] ) {
        $args = wp_parse_args(
            $args,
            [
                'search'   => '',
                'category' => '',
                'post_status' => '',
            ]
        );

        $modules = [];

        foreach ( self::get_module_index() as $module ) {
            if ( self::matches_filters( $module, $args ) ) {
                $modules[] = $module;
            }
        }

        usort(
            $modules,
            static function ( $a, $b ) {
                return $b['created'] <=> $a['created'];
            }
        );

        return $modules;
    }

    public static function get_all_categories() {
        $settings   = self::get_catalog_settings();
        $categories = array_merge( $settings['categories'], self::get_wordpress_category_paths() );

        foreach ( self::get_modules() as $module ) {
            if ( ! empty( $module['category'] ) ) {
                $categories[] = $module['category'];
            }
        }

        $categories = array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $categories ) );
        $categories = array_values( array_unique( $categories ) );

        sort( $categories, SORT_NATURAL | SORT_FLAG_CASE );

        return $categories;
    }

    public static function get_category_text() {
        return implode( "\n", self::get_all_categories() );
    }

    private static function get_module_index() {
        if ( null !== self::$module_index_cache ) {
            return self::$module_index_cache;
        }

        $modules     = [];
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        $usage_cache = self::get_shortcode_usage_cache();

        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                $slug      = basename( $path );
                $meta_file = $path . '/meta.json';
                $meta      = file_exists( $meta_file ) ? json_decode( file_get_contents( $meta_file ), true ) : [];
                $shortcode = '[hc_' . str_replace( '-', '_', $slug ) . ']';
                $created   = file_exists( $meta_file ) ? filemtime( $meta_file ) : filemtime( $path );
                $category_data = self::resolve_module_category_data(
                    $slug,
                    $shortcode,
                    $meta['name'] ?? '',
                    $usage_cache[ $shortcode ] ?? []
                );

                $modules[] = [
                    'slug'              => $slug,
                    'name'              => $meta['name'] ?? $slug,
                    'shortcode'         => $shortcode,
                    'desc'              => $meta['desc'] ?? '',
                    'created'           => $created,
                    'created_date'      => wp_date( 'd M Y', $created ),
                    'created_datetime'  => wp_date( 'd M Y H:i', $created ),
                    'post_count'        => (int) ( $usage_cache[ $shortcode ]['count'] ?? 0 ),
                    'category'          => $category_data['label'] ?? '',
                    'category_parent'   => $category_data['parent'] ?? '',
                    'category_child'    => $category_data['child'] ?? '',
                    'category_source'   => $category_data['source'] ?? '',
                    'category_term_ids' => $category_data['term_ids'] ?? [],
                    'publisher'         => self::get_publisher_name(),
                    'status_label'      => 'Aktif',
                    'posts_url'         => admin_url( 'edit.php?s=' . urlencode( $shortcode ) . '&post_type=post' ),
                ];
            }
        }

        usort(
            $modules,
            static function ( $a, $b ) {
                return $b['created'] <=> $a['created'];
            }
        );

        self::$module_index_cache = $modules;

        return self::$module_index_cache;
    }

    public static function get_wordpress_category_paths() {
        return wp_list_pluck( self::get_wordpress_category_choices(), 'path' );
    }

    public static function get_wordpress_category_choices() {
        $terms = get_terms(
            [
                'taxonomy'   => 'category',
                'hide_empty' => false,
            ]
        );

        if ( is_wp_error( $terms ) || empty( $terms ) ) {
            return [];
        }

        $term_map = [];
        foreach ( $terms as $term ) {
            $term_map[ $term->term_id ] = $term;
        }

        $choices = [];
        foreach ( $terms as $term ) {
            $lineage = self::get_term_lineage( $term->term_id, $term_map );
            $names   = wp_list_pluck( $lineage, 'name' );
            $depth   = max( 0, count( $names ) - 1 );

            $choices[] = [
                'term_id'   => (int) $term->term_id,
                'parent_id' => (int) $term->parent,
                'name'      => $term->name,
                'depth'     => $depth,
                'path'      => implode( ' › ', $names ),
                'parent'    => $names[0] ?? $term->name,
                'child'     => $depth > 0 ? $term->name : '',
            ];
        }

        usort(
            $choices,
            static function ( $a, $b ) {
                return strnatcasecmp( $a['path'], $b['path'] );
            }
        );

        return $choices;
    }

    public static function get_post_category_ids_for_module( $shortcode, $name = '' ) {
        $snapshot = self::resolve_module_category_data( '', $shortcode, $name );

        return $snapshot['term_ids'] ?? [];
    }

    public static function resolve_module_category_data( $slug, $shortcode, $name = '', $usage_snapshot = null ) {
        $settings       = self::get_catalog_settings();
        $saved_label    = $slug ? ( $settings['module_categories'][ $slug ] ?? '' ) : '';
        $usage_snapshot = is_array( $usage_snapshot ) ? $usage_snapshot : self::find_category_by_shortcode_usage( $shortcode );

        if ( ! empty( $usage_snapshot['label'] ) ) {
            return $usage_snapshot + [ 'source' => 'usage' ];
        }

        if ( $saved_label ) {
            $resolved = self::resolve_term_ids_from_label( $saved_label );

            return [
                'label'    => $saved_label,
                'parent'   => $resolved['parent'] ?? $saved_label,
                'child'    => $resolved['child'] ?? '',
                'term_ids' => $resolved['term_ids'] ?? [],
                'display'  => $saved_label,
                'source'   => 'manual',
            ];
        }

        $inferred = self::infer_category( $slug, $name );

        return [
            'label'    => $inferred,
            'parent'   => $inferred,
            'child'    => '',
            'term_ids' => [],
            'display'  => $inferred,
            'source'   => 'inferred',
        ];
    }

    public static function delete_module_category_assignment( $slug ) {
        $slug     = sanitize_key( $slug );
        $settings = self::get_catalog_settings();

        if ( isset( $settings['module_categories'][ $slug ] ) ) {
            unset( $settings['module_categories'][ $slug ] );
            update_option( self::OPTION_KEY, $settings, false );
        }
    }

    public static function save_module_category_assignment( $slug, $category ) {
        $slug     = sanitize_key( $slug );
        $category = self::sanitize_category( $category );

        if ( ! $slug ) {
            return;
        }

        $settings = self::get_catalog_settings();

        if ( ! isset( $settings['module_categories'] ) || ! is_array( $settings['module_categories'] ) ) {
            $settings['module_categories'] = [];
        }

        if ( ! isset( $settings['categories'] ) || ! is_array( $settings['categories'] ) ) {
            $settings['categories'] = [];
        }

        if ( ! $category ) {
            unset( $settings['module_categories'][ $slug ] );
            update_option( self::OPTION_KEY, $settings, false );
            return;
        }

        if ( ! in_array( $category, $settings['categories'], true ) ) {
            $settings['categories'][] = $category;
            sort( $settings['categories'], SORT_NATURAL | SORT_FLAG_CASE );
        }

        $settings['module_categories'][ $slug ] = $category;

        update_option( self::OPTION_KEY, $settings, false );
    }

    public static function group_modules_by_category( $modules ) {
        $grouped = [];

        foreach ( $modules as $module ) {
            $label = $module['category_parent'] ?: ( $module['category'] ?: 'Kategorisiz' );

            if ( ! isset( $grouped[ $label ] ) ) {
                $grouped[ $label ] = [];
            }

            $grouped[ $label ][] = $module;
        }

        ksort( $grouped, SORT_NATURAL | SORT_FLAG_CASE );

        return $grouped;
    }

    private static function sanitize_category( $category ) {
        $category = sanitize_text_field( $category );
        $category = trim( preg_replace( '/\s+/', ' ', $category ) );

        return $category;
    }

    private static function get_term_lineage( $term_id, $term_map ) {
        $lineage = [];
        $guard   = 0;

        while ( $term_id && isset( $term_map[ $term_id ] ) && $guard < 10 ) {
            array_unshift( $lineage, $term_map[ $term_id ] );
            $term_id = (int) $term_map[ $term_id ]->parent;
            $guard++;
        }

        return $lineage;
    }

    private static function find_category_by_shortcode_usage( $shortcode ) {
        $usage_cache = self::get_shortcode_usage_cache();

        if ( empty( $usage_cache[ $shortcode ]['label'] ) ) {
            return [];
        }

        return $usage_cache[ $shortcode ];
    }

    private static function resolve_term_ids_from_label( $label ) {
        $label = self::sanitize_category( $label );
        if ( ! $label ) {
            return [];
        }

        $parts   = preg_split( '/\s*[›>\/]+\s*/u', $label );
        $parts   = array_values( array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $parts ) ) );
        $choices = self::get_wordpress_category_choices();
        $matched = null;

        foreach ( $choices as $choice ) {
            $path_parts = preg_split( '/\s*[›>\/]+\s*/u', $choice['path'] );
            if ( count( $path_parts ) !== count( $parts ) ) {
                continue;
            }

            $ok = true;
            foreach ( $parts as $index => $part ) {
                if ( self::normalize_category_key( $path_parts[ $index ] ) !== self::normalize_category_key( $part ) ) {
                    $ok = false;
                    break;
                }
            }

            if ( $ok ) {
                $matched = $choice;
                break;
            }
        }

        if ( ! $matched ) {
            return [
                'parent'   => $parts[0] ?? $label,
                'child'    => count( $parts ) > 1 ? end( $parts ) : '',
                'term_ids' => [],
            ];
        }

        $ids = [];
        if ( $matched['parent'] ) {
            foreach ( $choices as $choice ) {
                if ( 0 === $choice['depth'] && self::normalize_category_key( $choice['name'] ) === self::normalize_category_key( $matched['parent'] ) ) {
                    $ids[] = (int) $choice['term_id'];
                    break;
                }
            }
        }

        if ( $matched['child'] ) {
            $ids[] = (int) $matched['term_id'];
        }

        return [
            'parent'   => $matched['parent'],
            'child'    => $matched['child'],
            'term_ids' => array_values( array_unique( array_filter( array_map( 'intval', $ids ) ) ) ),
        ];
    }

    public static function resolve_category_term_ids( $label ) {
        return self::resolve_term_ids_from_label( $label );
    }

    private static function normalize_category_key( $value ) {
        $value = remove_accents( wp_strip_all_tags( (string) $value ) );
        $value = function_exists( 'mb_strtolower' ) ? mb_strtolower( $value, 'UTF-8' ) : strtolower( $value );
        $value = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $value );

        return trim( preg_replace( '/\s+/', ' ', $value ) );
    }

    private static function get_shortcode_usage_cache() {
        global $wpdb;

        if ( null !== self::$module_usage_cache ) {
            return self::$module_usage_cache;
        }

        $rows = $wpdb->get_results(
            "SELECT ID, post_content
             FROM {$wpdb->posts}
             WHERE post_status NOT IN ('trash', 'auto-draft')
               AND post_type = 'post'
               AND post_content LIKE '%[hc_%'",
            ARRAY_A
        );

        $choices = self::get_wordpress_category_choices();
        $choice_map = [];
        foreach ( $choices as $choice ) {
            $choice_map[ $choice['term_id'] ] = $choice;
        }

        $usage = [];

        foreach ( $rows as $row ) {
            preg_match_all( '/\[hc_[a-z0-9_]+\]/i', (string) $row['post_content'], $matches );
            $shortcodes = array_values( array_unique( $matches[0] ?? [] ) );

            if ( empty( $shortcodes ) ) {
                continue;
            }

            $categories = wp_get_post_categories( (int) $row['ID'], [ 'fields' => 'all' ] );
            $paths      = self::extract_deep_category_paths( $categories, $choice_map );

            foreach ( $shortcodes as $shortcode ) {
                if ( empty( $usage[ $shortcode ] ) ) {
                    $usage[ $shortcode ] = [
                        'count'      => 0,
                        'path_counts'=> [],
                    ];
                }

                $usage[ $shortcode ]['count']++;

                foreach ( $paths as $path ) {
                    if ( empty( $usage[ $shortcode ]['path_counts'][ $path['path'] ] ) ) {
                        $usage[ $shortcode ]['path_counts'][ $path['path'] ] = $path + [ 'count' => 0 ];
                    }

                    $usage[ $shortcode ]['path_counts'][ $path['path'] ]['count']++;
                }
            }
        }

        foreach ( $usage as $shortcode => $snapshot ) {
            if ( empty( $snapshot['path_counts'] ) ) {
                continue;
            }

            uasort(
                $snapshot['path_counts'],
                static function ( $a, $b ) {
                    if ( $a['count'] === $b['count'] ) {
                        return $b['depth'] <=> $a['depth'];
                    }

                    return $b['count'] <=> $a['count'];
                }
            );

            $best = reset( $snapshot['path_counts'] );
            $usage[ $shortcode ]['label']    = $best['path'];
            $usage[ $shortcode ]['parent']   = $best['parent'];
            $usage[ $shortcode ]['child']    = $best['child'];
            $usage[ $shortcode ]['display']  = $best['path'];
            $usage[ $shortcode ]['term_ids'] = self::resolve_term_ids_from_label( $best['path'] )['term_ids'] ?? [];
        }

        self::$module_usage_cache = $usage;

        return self::$module_usage_cache;
    }

    private static function extract_deep_category_paths( $categories, $choice_map ) {
        if ( empty( $categories ) || is_wp_error( $categories ) ) {
            return [];
        }

        $term_ids = wp_list_pluck( $categories, 'term_id' );
        $paths    = [];

        foreach ( $categories as $term ) {
            $is_parent = false;

            foreach ( $term_ids as $other_id ) {
                if ( (int) $other_id === (int) $term->term_id ) {
                    continue;
                }

                if ( term_is_ancestor_of( (int) $term->term_id, (int) $other_id, 'category' ) ) {
                    $is_parent = true;
                    break;
                }
            }

            if ( $is_parent || empty( $choice_map[ $term->term_id ] ) ) {
                continue;
            }

            $paths[ $choice_map[ $term->term_id ]['path'] ] = $choice_map[ $term->term_id ];
        }

        return array_values( $paths );
    }

    private static function matches_filters( $module, $args ) {
        $search   = trim( (string) $args['search'] );
        $category = self::sanitize_category( (string) $args['category'] );
        $post_status = $args['post_status'] ?? '';

        if ( $post_status === 'used' && $module['post_count'] == 0 ) return false;
        if ( $post_status === 'unused' && $module['post_count'] > 0 ) return false;
        if ( $post_status === 'duplicates' && $module['post_count'] <= 1 ) return false;

        if ( $category && $module['category'] !== $category ) {
            return false;
        }

        if ( ! $search ) {
            return true;
        }

        $haystack = implode(
            ' ',
            [
                $module['name'],
                $module['slug'],
                $module['shortcode'],
                $module['desc'],
                $module['category'],
            ]
        );

        if ( function_exists( 'mb_stripos' ) ) {
            return false !== mb_stripos( $haystack, $search, 0, 'UTF-8' );
        }

        return false !== stripos( $haystack, $search );
    }

    private static function infer_category( $slug, $name ) {
        $source = function_exists( 'mb_strtolower' )
            ? mb_strtolower( $slug . ' ' . $name, 'UTF-8' )
            : strtolower( $slug . ' ' . $name );

        $map = [
            'Finans'     => [ 'kredi', 'maas', 'maaş', 'issizlik', 'işsizlik', 'emekli', 'kart' ],
            'Astroloji'  => [ 'burc', 'burç', 'yukselen', 'yükselen', 'dogum', 'doğum', 'ask', 'aşk' ],
            'Eğitim'     => [ 'tyt', 'ayt', 'okul' ],
            'Zaman'      => [ 'geri', 'sayim', 'sayım' ],
        ];

        foreach ( $map as $category => $keywords ) {
            foreach ( $keywords as $keyword ) {
                $matched = function_exists( 'mb_stripos' )
                    ? false !== mb_stripos( $source, $keyword, 0, 'UTF-8' )
                    : false !== stripos( $source, $keyword );

                if ( $matched ) {
                    return $category;
                }
            }
        }

        return 'Genel';
    }
}

class HC_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
        add_action( 'admin_init', [ $this, 'handle_settings_save' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
        add_action( 'wp_ajax_hc_preview_shortcode', [ $this, 'ajax_preview_shortcode' ] );
        add_action( 'wp_ajax_hc_delete_module', [ $this, 'ajax_delete_module' ] );
    }

    public function register_menu() {
        add_menu_page(
            'Hesaplama Suite',
            'H. Suite',
            'manage_options',
            'hesaplama-suite',
            [ $this, 'render_modules_page' ],
            'dashicons-calculator',
            30
        );

        add_submenu_page( 'hesaplama-suite', 'Dashboard', 'Dashboard', 'manage_options', 'hesaplama-suite', [ $this, 'render_modules_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Yazı Oluştur', 'Yazı Oluştur', 'manage_options', 'hesaplama-suite-writer', [ $this, 'render_writer_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Modül Oluştur', 'Modül Oluştur', 'manage_options', 'hesaplama-suite-generator', [ $this, 'render_generator_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Toplu Üretici (DeepSeek/Gemini)', 'Toplu Üretici', 'manage_options', 'hesaplama-suite-bulk', [ $this, 'render_bulk_page' ] );
        add_submenu_page( 'hesaplama-suite', 'AI Ayarları', 'AI Ayarları', 'manage_options', 'hesaplama-suite-ai', [ $this, 'render_ai_settings_page' ] );
        add_submenu_page( 'hesaplama-suite', 'GitHub Ayarları', 'GitHub Ayarları', 'manage_options', 'hesaplama-suite-github', [ $this, 'render_github_page' ] );
        add_submenu_page( 'hesaplama-suite', 'İçerik Planı', 'İçerik Planı', 'manage_options', 'hesaplama-suite-planner', [ $this, 'render_planner_page' ] );
    }

    public function enqueue_admin_assets( $hook ) {
        if ( strpos( $hook, 'hesaplama-suite' ) === false ) {
            return;
        }

        $script_file = HC_PLUGIN_DIR . 'admin/admin.js';
        $style_file  = HC_PLUGIN_DIR . 'admin/admin.css';
        $script_ver  = file_exists( $script_file ) ? HC_VERSION . '-' . filemtime( $script_file ) : HC_VERSION;
        $style_ver   = file_exists( $style_file ) ? HC_VERSION . '-' . filemtime( $style_file ) : HC_VERSION;

        wp_enqueue_style( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.css', [], $style_ver );
        wp_enqueue_script( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.js', [ 'jquery' ], $script_ver, true );
        wp_localize_script(
            'hc-admin',
            'hcAdmin',
            [
                'nonce'      => wp_create_nonce( 'hc_ajax_nonce' ),
                'ajaxurl'    => admin_url( 'admin-ajax.php' ),
                'previewing' => 'Önizleme hazırlanıyor...',
                'previewError' => 'Önizleme yüklenemedi.',
                'copied' => 'Shortcode kopyalandı.',
                'copyError' => 'Shortcode kopyalanamadı.',
                'deleteConfirm' => 'Bu modülü yerel eklentiden kalıcı olarak silmek istediğinize emin misiniz?',
                'deleteError' => 'Modül silinemedi.',
                'checking'   => 'Kontrol ediliyor...',
                'norepo'     => 'Önce repo adresini kaydedin.',
                'saving'     => 'Kaydediliyor...',
                'generating' => 'Yapay zeka makaleyi hazırlıyor (20-60 sn)...',
                'creatingDraft' => 'Taslak oluşturuluyor...',
                'createDraft' => 'Taslak oluştur',
                'analyzingCategory' => 'AI kategori analizi yapılıyor...',
                'analyzeCategory' => 'AI ile kategori analizi',
                'categoryAnalyzed' => 'Kategori önerisi seçildi. Kaydetmeyi unutmayın.',
            ]
        );
    }

    public function handle_settings_save() {
        if ( isset( $_POST['hc_save_github'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'hc_save_github_settings' ) ) wp_die( 'Gecersiz istek' );

            $updater = new HC_Github_Updater();
            $updater->save_settings( $_POST );

            wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite-github&saved=1' ) );
            exit;
        }

        if ( isset( $_POST['hc_save_modules'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'hc_save_module_catalog' ) ) wp_die( 'Gecersiz istek' );

            HC_Module_Inventory::save_catalog_settings( $_POST );

            wp_safe_redirect( add_query_arg( [ 'page' => 'hesaplama-suite', 'modules_saved' => '1' ], admin_url( 'admin.php' ) ) );
            exit;
        }
    }

    private function render_header($title) {
        ?>
        <div class="wrap hc-wrap" id="hc-main-wrap">
            <div class="hc-glass-header">
                <div class="hc-header-content">
                    <h1><?php echo esc_html($title); ?> <span class="hc-badge-pro">PRO</span></h1>
                    <p class="hc-page-subtitle">Hesaplama Suite Yönetim Paneli</p>
                </div>
                <div class="hc-header-actions" style="display:flex; align-items:center; gap:15px;">
                    <button type="button" class="button hc-theme-toggle" id="hc-theme-toggle" title="Karanlık/Aydınlık Mod Değiştir" style="border-radius:50%; width:40px; height:40px; padding:0; display:flex; align-items:center; justify-content:center;">
                        <span class="dashicons dashicons-visibility"></span>
                    </button>
                    <div class="hc-page-publisher">
                        <span class="hc-page-publisher-label">Yayıncı</span>
                        <strong><?php echo esc_html( HC_Module_Inventory::get_publisher_name() ); ?></strong>
                    </div>
                </div>
            </div>
            <div class="hc-tab-content" style="display:block; animation:none;">
        <?php
    }

    private function render_footer() {
        ?>
            </div>
        </div>
        <?php
    }

    public function render_modules_page() {
        $this->render_header('Dashboard & Modüller');
        $this->render_modules_tab();
        $this->render_footer();
    }

    public function render_writer_page() {
        $this->render_header('Yazı Oluştur');
        $writer = new HC_AI_Writer();
        $writer->render_writer_tab();
        $this->render_footer();
    }

    public function render_generator_page() {
        $this->render_header('Yapay Zeka ile Modül Oluştur');
        if (class_exists('HC_AI_Module_Generator')) {
            HC_AI_Module_Generator::render_generator_tab();
        } else {
            echo "<p>Generator sınıfı bulunamadı.</p>";
        }
        $this->render_footer();
    }

    public function render_bulk_page() {
        $this->render_header('Toplu AI Üretici (Gemini)');
        if (class_exists('HC_AI_Bulk_Generator')) {
            HC_AI_Bulk_Generator::render_bulk_generator_tab();
        } else {
            echo "<p>Bulk Generator sınıfı bulunamadı.</p>";
        }
        $this->render_footer();
    }

    public function render_ai_settings_page() {
        $this->render_header('AI Ayarları');
        $writer = new HC_AI_Writer();
        $writer->render_ai_settings_tab();
        $this->render_footer();
    }

    public function render_github_page() {
        $this->render_header('GitHub Ayarları');
        $this->render_github_tab();
        $this->render_footer();
    }

    public function render_planner_page() {
        $this->render_header('İçerik Planı');
        HC_Excel_Planner::render_planner_tab();
        $this->render_footer();
    }

    private function render_github_tab() {
        $updater  = new HC_Github_Updater();
        $settings = $updater->get_settings();
        $saved    = isset( $_GET['saved'] );
        $update   = sanitize_text_field( wp_unslash( $_GET['update'] ?? '' ) );
        $last     = get_option( 'hc_last_update', '-' );
        ?>
        <?php if ( $saved ) : ?>
            <div class="notice notice-success is-dismissible"><p>Ayarlar kaydedildi.</p></div>
        <?php endif; ?>

        <?php if ( 'success' === $update ) : ?>
            <div class="notice notice-success is-dismissible"><p>Eklenti GitHub üzerinden başarıyla güncellendi.</p></div>
        <?php elseif ( $update ) : ?>
            <div class="notice notice-error is-dismissible"><p>Güncelleme hatası: <?php echo esc_html( urldecode( $update ) ); ?></p></div>
        <?php endif; ?>

        <div class="hc-card">
            <h2>GitHub Bağlantısı</h2>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-github' ) ); ?>">
                <?php wp_nonce_field( 'hc_save_github_settings' ); ?>
                <input type="hidden" name="hc_save_github" value="1" />
                <table class="form-table">
                    <tr>
                        <th><label for="repo">Repository</label></th>
                        <td>
                            <input type="text" id="repo" name="repo" value="<?php echo esc_attr( $settings['repo'] ); ?>" placeholder="kullanici-adi/hesaplama-wp-addons" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="branch">Branch</label></th>
                        <td>
                            <input type="text" id="branch" name="branch" value="<?php echo esc_attr( $settings['branch'] ); ?>" placeholder="main" class="small-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="token">Token</label></th>
                        <td>
                            <input type="password" id="token" name="token" value="<?php echo esc_attr( $settings['token'] ); ?>" placeholder="ghp_xxxx" class="regular-text" />
                            <p class="description">Public repo için boş bırakabilirsiniz.</p>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button type="submit" name="hc_save_github" class="button button-primary">Kaydet</button>
                    <button type="button" id="hc-check-version" class="button">Son Versiyonu Kontrol Et</button>
                    <span id="hc-version-result" style="margin-left:10px; line-height:30px;"></span>
                </p>
            </form>
        </div>
        <div class="hc-card hc-update-box">
            <h2>Güncelleme</h2>
            <p>Son güncelleme: <strong><?php echo esc_html( $last ); ?></strong></p>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php wp_nonce_field( 'hc_update_from_github' ); ?>
                <input type="hidden" name="action" value="hc_update_from_github" />
                <button type="submit" class="button button-primary hc-update-btn" onclick="return confirm('Güncellemek istediğinize emin misiniz?')">GitHub'dan Güncelle</button>
            </form>
        </div>
        <?php
    }

    public function ajax_preview_shortcode() {
        if ( ! current_user_can( 'manage_options' ) ) {
            $this->send_preview_response( 'Önizleme yetkiniz yok.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            $this->send_preview_response( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 400 );
        }

        $shortcode  = sanitize_text_field( wp_unslash( $_REQUEST['shortcode'] ?? '' ) );
        $standalone = ! empty( $_REQUEST['standalone'] );
        $module     = $this->get_module_by_shortcode( $shortcode );

        if ( ! $module ) {
            $this->send_preview_response( 'Geçersiz veya kayıtlı olmayan shortcode.', 400 );
        }

        wp_enqueue_style( 'hesaplama-suite', HC_PLUGIN_URL . 'assets/style.css', [], HC_VERSION );
        wp_enqueue_script( 'hesaplama-suite', HC_PLUGIN_URL . 'assets/main.js', [], HC_VERSION, true );

        ob_start();
        echo do_shortcode( $module['shortcode'] );
        $html = ob_get_clean();

        if ( $standalone ) {
            nocache_headers();
            ?>
            <!doctype html>
            <html <?php language_attributes(); ?>>
            <head>
                <meta charset="<?php bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?php echo esc_html( $module['name'] ); ?> - Önizleme</title>
                <?php wp_print_styles(); ?>
                <style>
                    body { margin: 0; padding: 32px; background: #f8fafc; font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
                    .hc-standalone-preview { max-width: 920px; margin: 0 auto; }
                </style>
            </head>
            <body>
                <main class="hc-standalone-preview">
                    <?php echo $html; ?>
                </main>
                <?php wp_print_footer_scripts(); ?>
            </body>
            </html>
            <?php
            exit;
        }

        ob_start();
        wp_print_styles();
        wp_print_footer_scripts();
        $assets = ob_get_clean();

        $preview = $assets . '<div class="hc-admin-preview-surface">' . $html . '</div>';

        wp_send_json_success(
            [
                'html'      => $preview,
                'name'      => $module['name'],
                'shortcode' => $module['shortcode'],
            ]
        );
    }

    public function ajax_delete_module() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Modül silme yetkiniz yok.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 400 );
        }

        $slug   = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $module = $this->get_module_by_slug( $slug );

        if ( ! $module ) {
            wp_send_json_error( 'Geçersiz veya kayıtlı olmayan modül.', 400 );
        }

        $modules_root = realpath( HC_PLUGIN_DIR . 'modules' );
        $module_path  = realpath( HC_PLUGIN_DIR . 'modules/' . $slug );

        if ( ! $modules_root || ! $module_path || ! is_dir( $module_path ) ) {
            wp_send_json_error( 'Modül klasörü bulunamadı.', 404 );
        }

        $modules_root = rtrim( wp_normalize_path( $modules_root ), '/' ) . '/';
        $module_path  = rtrim( wp_normalize_path( $module_path ), '/' ) . '/';

        if ( 0 !== strpos( $module_path, $modules_root ) || $module_path === $modules_root ) {
            wp_send_json_error( 'Güvenli olmayan modül yolu reddedildi.', 400 );
        }

        $deleted = $this->delete_directory( $module_path );

        if ( ! $deleted ) {
            wp_send_json_error( 'Modül klasörü silinemedi.', 500 );
        }

        HC_Module_Inventory::delete_module_category_assignment( $slug );

        wp_send_json_success(
            [
                'slug'    => $slug,
                'message' => 'Modül silindi.',
            ]
        );
    }

    private function get_module_by_shortcode( $shortcode ) {
        foreach ( HC_Module_Inventory::get_modules() as $module ) {
            if ( $module['shortcode'] === $shortcode ) {
                return $module;
            }
        }

        return null;
    }

    private function get_module_by_slug( $slug ) {
        foreach ( HC_Module_Inventory::get_modules() as $module ) {
            if ( $module['slug'] === $slug ) {
                return $module;
            }
        }

        return null;
    }

    private function delete_directory( $path ) {
        if ( ! is_dir( $path ) ) {
            return false;
        }

        $items = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $path, FilesystemIterator::SKIP_DOTS ),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ( $items as $item ) {
            $item_path = $item->getPathname();

            if ( $item->isDir() ) {
                if ( ! rmdir( $item_path ) ) {
                    return false;
                }
                continue;
            }

            if ( ! unlink( $item_path ) ) {
                return false;
            }
        }

        return rmdir( $path );
    }

    private function send_preview_response( $message, $status ) {
        if ( ! empty( $_REQUEST['standalone'] ) ) {
            wp_die( esc_html( $message ), esc_html__( 'Önizleme hatası', 'hesaplama-suite' ), [ 'response' => $status ] );
        }

        wp_send_json_error( $message, $status );
    }

    private function render_modules_tab() {
        $search            = sanitize_text_field( wp_unslash( $_GET['s'] ?? '' ) );
        $selected_category = sanitize_text_field( wp_unslash( $_GET['module_category'] ?? '' ) );
        $post_status       = sanitize_text_field( wp_unslash( $_GET['post_status'] ?? '' ) );
        $modules           = HC_Module_Inventory::get_modules( [ 'search' => $search, 'category' => $selected_category, 'post_status' => $post_status ] );
        $all_modules       = HC_Module_Inventory::get_modules();
        $all_categories    = HC_Module_Inventory::get_all_categories();
        $nonce             = wp_create_nonce( 'hc_ajax_nonce' );
        $total_posts       = array_sum( wp_list_pluck( $all_modules, 'post_count' ) );
        $latest_module     = ! empty( $all_modules ) ? $all_modules[0] : null;
        $grouped_modules   = HC_Module_Inventory::group_modules_by_category( $modules );
        $duplicate_modules = array_values( array_filter( $all_modules, static fn( $module ) => (int) $module['post_count'] > 1 ) );
        $duplicate_extra_usage = array_sum(
            array_map(
                static fn( $module ) => max( 0, (int) $module['post_count'] - 1 ),
                $duplicate_modules
            )
        );
        ?>
        <?php if ( isset( $_GET['modules_saved'] ) ) : ?>
            <div class="notice notice-success is-dismissible"><p>Modül kataloğu güncellendi.</p></div>
        <?php endif; ?>

        <div class="hc-stats-grid">
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Modül</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( $all_modules ) ); ?></strong>
                <span class="hc-stat-foot">Canlı katalog</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Kategori</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( $all_categories ) ); ?></strong>
                <span class="hc-stat-foot">Filtrelenebilir yapı</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Kullanım</span>
                <strong class="hc-stat-value"><?php echo esc_html( $total_posts ); ?></strong>
                <span class="hc-stat-foot">Shortcode yerleşimi</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Mukerrer Kullanim</span>
                <strong class="hc-stat-value" style="color:var(--hc-secondary);"><?php echo esc_html( count( $duplicate_modules ) ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( $duplicate_extra_usage ); ?> ekstra yerlestim</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Son Eklenen</span>
                <strong class="hc-stat-value hc-stat-small"><?php echo esc_html( $latest_module ? $latest_module['created_datetime'] : '-' ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( $latest_module ? $latest_module['name'] : 'Yok' ); ?></span>
            </div>
        </div>

        <div class="hc-card" style="margin-bottom:20px;">
            <p style="margin:0; color:var(--hc-text-muted);">
                "Toplam Kullanim" tum yazi durumlarindaki shortcode sayisini gosterir. "Yazi Eklenmeyenler" hic kullanilmayan modulleri, "Mukerrer Kullanimlar" ise birden fazla yazida gecen modulleri listeler.
            </p>
        </div>

        <?php if ( ! empty( $duplicate_modules ) ) : ?>
            <div class="hc-card" style="margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h2 style="margin:0 0 4px;">Mukerrer Kullanimlar</h2>
                        <p style="margin:0; color:var(--hc-text-muted);">
                            Ayni modulun birden fazla yazida gectigi yerleri buradan topluca gorebilirsiniz.
                        </p>
                    </div>
                    <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite&post_status=duplicates' ) ); ?>">Sadece mukerrerleri filtrele</a>
                </div>
                <div class="hc-module-grid" style="margin-top:16px;">
                    <?php foreach ( array_slice( $duplicate_modules, 0, 12 ) as $module ) : ?>
                        <article class="hc-module-card hc-module-card-compact">
                            <div class="hc-module-card-top">
                                <span class="hc-category-badge"><?php echo esc_html( $module['category_child'] ?: $module['category_parent'] ?: 'Kategorisiz' ); ?></span>
                                <span class="hc-usage-badge is-used"><?php echo esc_html( $module['post_count'] . ' yazida' ); ?></span>
                            </div>
                            <div class="hc-module-card-main">
                                <h3><?php echo esc_html( $module['name'] ); ?></h3>
                                <p><?php echo esc_html( $module['shortcode'] ); ?></p>
                            </div>
                            <div class="hc-card-actions hc-card-actions-compact">
                                <a class="button" href="<?php echo esc_url( $module['posts_url'] ); ?>">
                                    <span class="dashicons dashicons-admin-post" aria-hidden="true"></span> Kullanimlari ac
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <?php if ( count( $duplicate_modules ) > 12 ) : ?>
                    <p style="margin:16px 0 0; color:var(--hc-text-muted);">
                        Ilk 12 modul gosteriliyor. Tum liste icin filtreyi kullanin.
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="hc-card" style="margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
                <h2 style="margin:0;">Modül Kataloğu</h2>
                <form method="get" class="hc-toolbar-form" style="margin:0;">
                    <input type="hidden" name="page" value="hesaplama-suite" />
                    <input type="search" name="s" value="<?php echo esc_attr( $search ); ?>" placeholder="Modül ara..." style="width:200px;" />
                    <select name="module_category">
                        <option value="">Tüm kategoriler</option>
                        <?php foreach ( $all_categories as $category ) : ?>
                            <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $selected_category, $category ); ?>><?php echo esc_html( $category ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="post_status">
                        <option value="">Kullanım Durumu</option>
                        <option value="used" <?php selected( $post_status, 'used' ); ?>>Yazı Eklenenler</option>
                        <option value="unused" <?php selected( $post_status, 'unused' ); ?>>Yazı Eklenmeyenler</option>
                    </select>
                    <button type="submit" class="button button-primary">Filtrele</button>
                    <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">Temizle</a>
                </form>
            </div>
        </div>

        <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">
            <?php wp_nonce_field( 'hc_save_module_catalog' ); ?>
            <input type="hidden" name="hc_save_modules" value="1" />

            <div class="hc-card" style="display:none;" id="hc-category-manager">
                <h3>Kategori Yönetimi</h3>
                <div class="hc-toolbar">
                    <textarea id="hc-categories" name="hc_categories" rows="3" class="large-text" placeholder="Her satıra bir kategori yazın."><?php echo esc_textarea( HC_Module_Inventory::get_category_text() ); ?></textarea>
                    <div class="hc-category-add-row" style="margin-top:10px;">
                        <input type="text" id="hc-new-category" class="regular-text" placeholder="Yeni kategori adı" />
                        <button type="button" class="button" id="hc-add-category-btn">Hızlı Ekle</button>
                    </div>
                </div>
            </div>

            <div class="hc-card hc-catalog-shell">
                <div style="display:flex; justify-content:space-between; margin-bottom:15px; align-items:center;">
                    <h2 style="margin:0;">Aktif Modüller</h2>
                    <button type="button" class="button hc-button-ghost" data-hc-toggle-categories>Kategorileri Yönet</button>
                </div>
                
                <?php if ( empty( $modules ) ) : ?>
                    <div class="hc-empty-state">
                        <span class="dashicons dashicons-search" aria-hidden="true"></span>
                        <h3>Filtreye uygun modül bulunamadı</h3>
                        <p>Arama metnini veya kategori/kullanım filtresini değiştirerek tekrar deneyin.</p>
                        <a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">Filtreleri Temizle</a>
                    </div>
                    <p>Filtreye uygun modül bulunamadı.</p>
                <?php else : ?>
                    <?php foreach ( $grouped_modules as $group_label => $group_modules ) : ?>
                    <section class="hc-module-group">
                        <div class="hc-module-group-header">
                            <div>
                                <h3><?php echo esc_html( $group_label ); ?></h3>
                                <p><?php echo esc_html( count( $group_modules ) ); ?> modül</p>
                            </div>
                        </div>
                    <div class="hc-module-grid">
                        <?php foreach ( $group_modules as $module ) : ?>
                            <?php
                            $is_used        = $module['post_count'] > 0;
                            $standalone_url = add_query_arg(
                                [
                                    'action'     => 'hc_preview_shortcode',
                                    'nonce'      => $nonce,
                                    'shortcode'  => $module['shortcode'],
                                    'standalone' => '1',
                                ],
                                admin_url( 'admin-ajax.php' )
                            );
                            ?>
                            <article class="hc-module-card hc-module-card-compact" data-module-card data-slug="<?php echo esc_attr( $module['slug'] ); ?>">
                                <div class="hc-module-card-top">
                                    <span class="hc-category-badge"><?php echo esc_html( $module['category_child'] ?: $group_label ); ?></span>
                                    <span class="hc-usage-badge <?php echo $is_used ? 'is-used' : 'is-unused'; ?>">
                                        <?php echo $is_used ? esc_html( 'Yazıda (' . $module['post_count'] . ')' ) : 'Eklenmedi'; ?>
                                    </span>
                                </div>
                                <div class="hc-module-card-main">
                                    <h3><?php echo esc_html( $module['name'] ); ?></h3>
                                    <p><?php echo esc_html( $module['desc'] ); ?></p>
                                </div>
                                <div class="hc-module-meta-grid">
                                    <div><span>Slug</span><code><?php echo esc_html( $module['slug'] ); ?></code></div>
                                    <div><span>Eklenme</span><strong><?php echo esc_html( $module['created_date'] ); ?></strong></div>
                                    <div><span>Yayıncı</span><strong><?php echo esc_html( $module['publisher'] ); ?></strong></div>
                                </div>
                                <button type="button" class="hc-shortcode-chip" data-hc-copy-shortcode data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>">
                                    <span class="dashicons dashicons-shortcode" aria-hidden="true"></span>
                                    <code><?php echo esc_html( $module['shortcode'] ); ?></code>
                                </button>
                                <label class="hc-card-select-label">
                                    <span>Kategori</span>
                                    <select name="hc_module_category[<?php echo esc_attr( $module['slug'] ); ?>]" class="hc-category-select">
                                        <option value="">Seçiniz</option>
                                        <?php foreach ( $all_categories as $category ) : ?>
                                            <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $module['category'], $category ); ?>><?php echo esc_html( $category ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                                <div class="hc-card-actions hc-card-actions-compact">
                                    <button type="button" class="button button-primary hc-preview-btn" data-hc-preview data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-standalone-url="<?php echo esc_url( $standalone_url ); ?>">
                                        <span class="dashicons dashicons-visibility" aria-hidden="true"></span> Önizle
                                    </button>
                                    <button type="button" class="button hc-ai-category-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-desc="<?php echo esc_attr( $module['desc'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
                                        <span class="dashicons dashicons-category" aria-hidden="true"></span> AI ile kategori analizi
                                    </button>
                                    <button type="button" class="button hc-yazi-ekle-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
                                        <span class="dashicons dashicons-edit-page" aria-hidden="true"></span> Taslak oluştur
                                    </button>
                                    <a class="button hc-button-ghost" href="<?php echo esc_url( $module['posts_url'] ); ?>">
                                        <span class="dashicons dashicons-admin-post" aria-hidden="true"></span> Kullanımlar
                                    </a>
                                    <button type="button" class="button hc-button-danger" data-hc-delete-module data-slug="<?php echo esc_attr( $module['slug'] ); ?>" data-name="<?php echo esc_attr( $module['name'] ); ?>">
                                        <span class="dashicons dashicons-trash" aria-hidden="true"></span> Modülü sil
                                    </button>
                                    <span class="hc-yazi-ekle-msg"></span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    </section>
                    <?php endforeach; ?>
                    <?php if ( false ) : ?>
                    <div class="hc-table-wrap" aria-hidden="true">
                        <table class="wp-list-table widefat striped hc-modules-table">
                            <thead>
                                <tr>
                                    <th style="width:20%">Modül Adı</th>
                                    <th style="width:15%">Kategori</th>
                                    <th style="width:15%">Shortcode</th>
                                    <th style="width:15%">Durum</th>
                                    <th style="width:20%">Açıklama</th>
                                    <th style="width:15%">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $modules as $module ) : ?>
                                    <tr>
                                        <td>
                                            <strong style="display:block; font-size:14px; margin-bottom:4px;"><?php echo esc_html( $module['name'] ); ?></strong>
                                            <div class="hc-row-meta"><code><?php echo esc_html( $module['slug'] ); ?></code></div>
                                        </td>
                                        <td>
                                            <select name="hc_module_category[<?php echo esc_attr( $module['slug'] ); ?>]" class="hc-category-select" style="width:100%;">
                                                <option value="">Seçiniz</option>
                                                <?php foreach ( $all_categories as $category ) : ?>
                                                    <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $module['category'], $category ); ?>><?php echo esc_html( $category ); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><code class="hc-shortcode-code" style="cursor:pointer;" onclick="navigator.clipboard.writeText('<?php echo esc_attr( $module['shortcode'] ); ?>'); alert('Kopyalandı!');" title="Kopyalamak için tıkla"><?php echo esc_html( $module['shortcode'] ); ?></code></td>
                                        <td>
                                            <?php if ( $module['post_count'] > 0 ) : ?>
                                                <span class="hc-inline-badge" style="background:#4CAF50; color:#fff; font-size:11px;">Yazı Eklendi (<?php echo $module['post_count']; ?>)</span>
                                            <?php else : ?>
                                                <span class="hc-inline-badge" style="background:#f44336; color:#fff; font-size:11px;">Eklenmedi</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><div class="hc-module-desc"><?php echo esc_html( $module['desc'] ); ?></div></td>
                                        <td>
                                            <button type="button" class="button button-small hc-yazi-ekle-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">Taslak oluştur</button>
                                            <span class="hc-yazi-ekle-msg" style="display:block;"></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <p class="submit">
                    <button type="submit" name="hc_save_modules" class="button button-primary">Değişiklikleri Kaydet</button>
                </p>
            </div>
        </form>

        <div class="hc-preview-modal" id="hc-preview-modal" hidden aria-hidden="true">
            <div class="hc-preview-backdrop" data-hc-preview-close></div>
            <div class="hc-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="hc-preview-title">
                <div class="hc-preview-header">
                    <div>
                        <span class="hc-toolbar-kicker">Canlı shortcode</span>
                        <h2 id="hc-preview-title">Modül Önizleme</h2>
                        <button type="button" class="hc-shortcode-chip hc-preview-shortcode" data-hc-copy-shortcode data-shortcode="">
                            <span class="dashicons dashicons-shortcode" aria-hidden="true"></span>
                            <code id="hc-preview-shortcode-text"></code>
                        </button>
                    </div>
                    <button type="button" class="button hc-icon-button" data-hc-preview-close aria-label="Önizlemeyi kapat">
                        <span class="dashicons dashicons-no-alt" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="hc-preview-toolbar" aria-label="Önizleme araçları">
                    <div class="hc-preview-device-toggle" role="group" aria-label="Önizleme genişliği">
                        <button type="button" class="is-active" data-hc-preview-size="desktop">Masaüstü</button>
                        <button type="button" data-hc-preview-size="mobile">Mobil</button>
                    </div>
                    <div class="hc-preview-actions">
                        <button type="button" class="button" data-hc-modal-copy>Shortcode Kopyala</button>
                        <a class="button" id="hc-preview-standalone" href="#" target="_blank" rel="noopener">Bağımsız Aç</a>
                        <button type="button" class="button button-primary" id="hc-preview-insert">Taslak oluştur</button>
                    </div>
                </div>
                <div class="hc-preview-body">
                    <div class="hc-preview-frame" data-preview-size="desktop">
                        <div class="hc-preview-loading" id="hc-preview-loading" aria-live="polite">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="hc-preview-content" id="hc-preview-content"></div>
                    </div>
                </div>
                <div class="hc-preview-status" id="hc-preview-status" role="status" aria-live="polite"></div>
            </div>
        </div>
        <?php
    }
}

