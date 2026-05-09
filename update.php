<?php
$file = 'admin/class-admin-page.php';
$content = file_get_contents($file);

$new_class = <<<EOT
class HC_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [ \$this, 'register_menu' ] );
        add_action( 'admin_init', [ \$this, 'handle_settings_save' ] );
        add_action( 'admin_enqueue_scripts', [ \$this, 'enqueue_admin_assets' ] );
    }

    public function register_menu() {
        add_menu_page(
            'Hesaplama Suite',
            'H. Suite',
            'manage_options',
            'hesaplama-suite',
            [ \$this, 'render_modules_page' ],
            'dashicons-calculator',
            30
        );

        add_submenu_page( 'hesaplama-suite', 'Dashboard', 'Dashboard', 'manage_options', 'hesaplama-suite', [ \$this, 'render_modules_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Yazı Oluştur', 'Yazı Oluştur', 'manage_options', 'hesaplama-suite-writer', [ \$this, 'render_writer_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Modül Oluştur', 'Modül Oluştur', 'manage_options', 'hesaplama-suite-generator', [ \$this, 'render_generator_page' ] );
        add_submenu_page( 'hesaplama-suite', 'AI Ayarları', 'AI Ayarları', 'manage_options', 'hesaplama-suite-ai', [ \$this, 'render_ai_settings_page' ] );
        add_submenu_page( 'hesaplama-suite', 'GitHub Ayarları', 'GitHub Ayarları', 'manage_options', 'hesaplama-suite-github', [ \$this, 'render_github_page' ] );
    }

    public function enqueue_admin_assets( \$hook ) {
        if ( strpos( \$hook, 'hesaplama-suite' ) === false ) {
            return;
        }

        \$script_file = HC_PLUGIN_DIR . 'admin/admin.js';
        \$style_file  = HC_PLUGIN_DIR . 'admin/admin.css';
        \$script_ver  = file_exists( \$script_file ) ? HC_VERSION . '-' . filemtime( \$script_file ) : HC_VERSION;
        \$style_ver   = file_exists( \$style_file ) ? HC_VERSION . '-' . filemtime( \$style_file ) : HC_VERSION;

        wp_enqueue_style( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.css', [], \$style_ver );
        wp_enqueue_script( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.js', [ 'jquery' ], \$script_ver, true );
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
        if ( isset( \$_POST['hc_save_github'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( \$_POST['_wpnonce'] ) || ! wp_verify_nonce( \$_POST['_wpnonce'], 'hc_save_github_settings' ) ) wp_die( 'Gecersiz istek' );

            \$updater = new HC_Github_Updater();
            \$updater->save_settings( \$_POST );

            wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite-github&saved=1' ) );
            exit;
        }

        if ( isset( \$_POST['hc_save_modules'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( \$_POST['_wpnonce'] ) || ! wp_verify_nonce( \$_POST['_wpnonce'], 'hc_save_module_catalog' ) ) wp_die( 'Gecersiz istek' );

            HC_Module_Inventory::save_catalog_settings( \$_POST );

            wp_safe_redirect( add_query_arg( [ 'page' => 'hesaplama-suite', 'modules_saved' => '1' ], admin_url( 'admin.php' ) ) );
            exit;
        }
    }

    private function render_header(\$title) {
        ?>
        <div class="wrap hc-wrap hc-light-mode" id="hc-main-wrap">
            <div class="hc-glass-header">
                <div class="hc-header-content">
                    <h1><?php echo esc_html(\$title); ?> <span class="hc-badge-pro">PRO</span></h1>
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
        \$this->render_header('Dashboard & Modüller');
        \$this->render_modules_tab();
        \$this->render_footer();
    }

    public function render_writer_page() {
        \$this->render_header('Yazı Oluştur');
        \$writer = new HC_AI_Writer();
        \$writer->render_writer_tab();
        \$this->render_footer();
    }

    public function render_generator_page() {
        \$this->render_header('Yapay Zeka ile Modül Oluştur');
        if (class_exists('HC_AI_Module_Generator')) {
            HC_AI_Module_Generator::render_generator_tab();
        } else {
            echo "<p>Generator sınıfı bulunamadı.</p>";
        }
        \$this->render_footer();
    }

    public function render_ai_settings_page() {
        \$this->render_header('AI Ayarları');
        \$writer = new HC_AI_Writer();
        \$writer->render_ai_settings_tab();
        \$this->render_footer();
    }

    public function render_github_page() {
        \$this->render_header('GitHub Ayarları');
        \$this->render_github_tab();
        \$this->render_footer();
    }

    private function render_github_tab() {
        \$updater  = new HC_Github_Updater();
        \$settings = \$updater->get_settings();
        \$saved    = isset( \$_GET['saved'] );
        \$update   = sanitize_text_field( wp_unslash( \$_GET['update'] ?? '' ) );
        \$last     = get_option( 'hc_last_update', '-' );
        ?>
        <?php if ( \$saved ) : ?>
            <div class="notice notice-success is-dismissible"><p>Ayarlar kaydedildi.</p></div>
        <?php endif; ?>

        <?php if ( 'success' === \$update ) : ?>
            <div class="notice notice-success is-dismissible"><p>Eklenti GitHub üzerinden başarıyla güncellendi.</p></div>
        <?php elseif ( \$update ) : ?>
            <div class="notice notice-error is-dismissible"><p>Güncelleme hatası: <?php echo esc_html( urldecode( \$update ) ); ?></p></div>
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
                            <input type="text" id="repo" name="repo" value="<?php echo esc_attr( \$settings['repo'] ); ?>" placeholder="kullanici-adi/hesaplama-wp-addons" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="branch">Branch</label></th>
                        <td>
                            <input type="text" id="branch" name="branch" value="<?php echo esc_attr( \$settings['branch'] ); ?>" placeholder="main" class="small-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="token">Token</label></th>
                        <td>
                            <input type="password" id="token" name="token" value="<?php echo esc_attr( \$settings['token'] ); ?>" placeholder="ghp_xxxx" class="regular-text" />
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
            <p>Son güncelleme: <strong><?php echo esc_html( \$last ); ?></strong></p>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php wp_nonce_field( 'hc_update_from_github' ); ?>
                <input type="hidden" name="action" value="hc_update_from_github" />
                <button type="submit" class="button button-primary hc-update-btn" onclick="return confirm('Güncellemek istediğinize emin misiniz?')">GitHub'dan Güncelle</button>
            </form>
        </div>
        <?php
    }

    private function render_modules_tab() {
        \$search            = sanitize_text_field( wp_unslash( \$_GET['s'] ?? '' ) );
        \$selected_category = sanitize_text_field( wp_unslash( \$_GET['module_category'] ?? '' ) );
        \$modules           = HC_Module_Inventory::get_modules( [ 'search' => \$search, 'category' => \$selected_category ] );
        \$all_modules       = HC_Module_Inventory::get_modules();
        \$all_categories    = HC_Module_Inventory::get_all_categories();
        \$nonce             = wp_create_nonce( 'hc_ajax_nonce' );
        \$total_posts       = array_sum( wp_list_pluck( \$all_modules, 'post_count' ) );
        \$latest_module     = ! empty( \$all_modules ) ? \$all_modules[0] : null;
        ?>
        <?php if ( isset( \$_GET['modules_saved'] ) ) : ?>
            <div class="notice notice-success is-dismissible"><p>Modül kataloğu güncellendi.</p></div>
        <?php endif; ?>

        <div class="hc-stats-grid">
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Modül</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( \$all_modules ) ); ?></strong>
                <span class="hc-stat-foot">Canlı katalog</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Kategori</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( \$all_categories ) ); ?></strong>
                <span class="hc-stat-foot">Filtrelenebilir yapı</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Kullanım</span>
                <strong class="hc-stat-value"><?php echo esc_html( \$total_posts ); ?></strong>
                <span class="hc-stat-foot">Shortcode yerleşimi</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Son Eklenen</span>
                <strong class="hc-stat-value hc-stat-small"><?php echo esc_html( \$latest_module ? \$latest_module['created_datetime'] : '-' ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( \$latest_module ? \$latest_module['name'] : 'Yok' ); ?></span>
            </div>
        </div>

        <div class="hc-card" style="margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
                <h2 style="margin:0;">Modül Kataloğu</h2>
                <form method="get" class="hc-toolbar-form" style="margin:0;">
                    <input type="hidden" name="page" value="hesaplama-suite" />
                    <input type="search" name="s" value="<?php echo esc_attr( \$search ); ?>" placeholder="Modül ara..." style="width:200px;" />
                    <select name="module_category">
                        <option value="">Tüm kategoriler</option>
                        <?php foreach ( \$all_categories as \$category ) : ?>
                            <option value="<?php echo esc_attr( \$category ); ?>" <?php selected( \$selected_category, \$category ); ?>><?php echo esc_html( \$category ); ?></option>
                        <?php endforeach; ?>
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
                
                <?php if ( empty( \$modules ) ) : ?>
                    <p>Filtreye uygun modül bulunamadı.</p>
                <?php else : ?>
                    <div class="hc-table-wrap">
                        <table class="wp-list-table widefat striped hc-modules-table">
                            <thead>
                                <tr>
                                    <th style="width:25%">Modül Adı</th>
                                    <th style="width:15%">Kategori</th>
                                    <th style="width:20%">Shortcode</th>
                                    <th style="width:25%">Açıklama</th>
                                    <th style="width:15%">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( \$modules as \$module ) : ?>
                                    <tr>
                                        <td>
                                            <strong style="display:block; font-size:14px; margin-bottom:4px;"><?php echo esc_html( \$module['name'] ); ?></strong>
                                            <div class="hc-row-meta"><code><?php echo esc_html( \$module['slug'] ); ?></code></div>
                                        </td>
                                        <td>
                                            <select name="hc_module_category[<?php echo esc_attr( \$module['slug'] ); ?>]" class="hc-category-select" style="width:100%;">
                                                <option value="">Seçiniz</option>
                                                <?php foreach ( \$all_categories as \$category ) : ?>
                                                    <option value="<?php echo esc_attr( \$category ); ?>" <?php selected( \$module['category'], \$category ); ?>><?php echo esc_html( \$category ); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><code class="hc-shortcode-code" style="cursor:pointer;" onclick="navigator.clipboard.writeText('<?php echo esc_attr( \$module['shortcode'] ); ?>'); alert('Kopyalandı!');" title="Kopyalamak için tıkla"><?php echo esc_html( \$module['shortcode'] ); ?></code></td>
                                        <td><div class="hc-module-desc"><?php echo esc_html( \$module['desc'] ); ?></div></td>
                                        <td>
                                            <button type="button" class="button button-small hc-yazi-ekle-btn" data-name="<?php echo esc_attr( \$module['name'] ); ?>" data-shortcode="<?php echo esc_attr( \$module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( \$nonce ); ?>">Yazı Ekle</button>
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
EOT;

$new_content = preg_replace('/class HC_Admin_Page \{.*/s', $new_class, $content);
file_put_contents($file, $new_content);
echo "Done";
?>
