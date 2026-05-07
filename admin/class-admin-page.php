<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class HC_Module_Inventory {

    const OPTION_KEY = 'hc_module_catalog';

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
        global $wpdb;

        $args = wp_parse_args(
            $args,
            [
                'search'   => '',
                'category' => '',
                'post_status' => '',
                'post_status' => '', 'post_status' => '',
            ]
        );

        $settings    = self::get_catalog_settings();
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        $modules     = [];

        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                $slug      = basename( $path );
                $meta_file = $path . '/meta.json';
                $meta      = file_exists( $meta_file ) ? json_decode( file_get_contents( $meta_file ), true ) : [];
                $shortcode = '[hc_' . str_replace( '-', '_', $slug ) . ']';
                $created   = file_exists( $meta_file ) ? filemtime( $meta_file ) : filemtime( $path );
                $category  = $settings['module_categories'][ $slug ] ?? '';

                if ( ! $category && ! empty( $meta['category'] ) ) {
                    $category = self::sanitize_category( $meta['category'] );
                }

                if ( ! $category ) {
                    $category = self::infer_category( $slug, $meta['name'] ?? '' );
                }

                $post_count = (int) $wpdb->get_var(
                    $wpdb->prepare(
                        "SELECT COUNT(*) FROM {$wpdb->posts}
                         WHERE post_content LIKE %s
                           AND post_status != 'trash'
                           AND post_type = 'post'",
                        '%' . $wpdb->esc_like( $shortcode ) . '%'
                    )
                );

                $module = [
                    'slug'              => $slug,
                    'name'              => $meta['name'] ?? $slug,
                    'shortcode'         => $shortcode,
                    'desc'              => $meta['desc'] ?? '',
                    'created'           => $created,
                    'created_date'      => wp_date( 'd M Y', $created ),
                    'created_datetime'  => wp_date( 'd M Y H:i', $created ),
                    'post_count'        => $post_count,
                    'category'          => $category,
                    'publisher'         => self::get_publisher_name(),
                    'status_label'      => 'Aktif',
                    'posts_url'         => admin_url( 'edit.php?s=' . urlencode( $shortcode ) . '&post_type=post' ),
                ];

                if ( self::matches_filters( $module, $args ) ) {
                    $modules[] = $module;
                }
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
        $categories = $settings['categories'];

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

    public static function group_modules_by_category( $modules ) {
        $grouped = [];

        foreach ( $modules as $module ) {
            $label = $module['category'] ?: 'Kategorisiz';

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

    private static function matches_filters( $module, $args ) {
        $search   = trim( (string) $args['search'] );
        $category = self::sanitize_category( (string) $args['category'] );
        $post_status = $args['post_status'] ?? '';

        if ( $post_status === 'used' && $module['post_count'] == 0 ) return false;
        if ( $post_status === 'unused' && $module['post_count'] > 0 ) return false;

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
                'checking'   => 'Kontrol ediliyor...',
                'norepo'     => 'Önce repo adresini kaydedin.',
                'saving'     => 'Kaydediliyor...',
                'generating' => 'Yapay zeka makaleyi hazırlıyor (20-60 sn)...',
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
        <div class="wrap hc-wrap hc-light-mode" id="hc-main-wrap">
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
                <span class="hc-stat-label">Son Eklenen</span>
                <strong class="hc-stat-value hc-stat-small"><?php echo esc_html( $latest_module ? $latest_module['created_datetime'] : '-' ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( $latest_module ? $latest_module['name'] : 'Yok' ); ?></span>
            </div>
        </div>

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

            <div class="hc-card">
                <div style="display:flex; justify-content:space-between; margin-bottom:15px; align-items:center;">
                    <h2 style="margin:0;">Aktif Modüller</h2>
                    <button type="button" class="button" onclick="jQuery('#hc-category-manager').slideToggle();">Kategorileri Yönet</button>
                </div>
                
                <?php if ( empty( $modules ) ) : ?>
                    <p>Filtreye uygun modül bulunamadı.</p>
                <?php else : ?>
                    <div class="hc-table-wrap">
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
                                            <button type="button" class="button button-small hc-yazi-ekle-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">Yazı Ekle</button>
                                            <span class="hc-yazi-ekle-msg" style="display:block;"></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                <p class="submit">
                    <button type="submit" name="hc_save_modules" class="button button-primary">Değişiklikleri Kaydet</button>
                </p>
            </div>
        </form>
        <?php
    }
}
