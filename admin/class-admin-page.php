<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu',    [ $this, 'register_menu' ] );
        add_action( 'admin_init',    [ $this, 'handle_settings_save' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function register_menu() {
        add_menu_page(
            'Hesaplama Suite',
            'Hesaplama Suite',
            'manage_options',
            'hesaplama-suite',
            [ $this, 'render_page' ],
            'dashicons-calculator',
            30
        );
    }

    public function enqueue_admin_assets( $hook ) {
        if ( $hook !== 'toplevel_page_hesaplama-suite' ) return;
        wp_enqueue_style( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.css', [], HC_VERSION );
        wp_enqueue_script( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.js', [ 'jquery' ], HC_VERSION, true );
        wp_localize_script( 'hc-admin', 'hcAdmin', [
            'nonce'       => wp_create_nonce( 'hc_ajax_nonce' ),
            'ajaxurl'     => admin_url( 'admin-ajax.php' ),
            'checking'    => 'Kontrol ediliyor...',
            'norepo'      => 'Önce repo adresini kaydedin.',
            'generating'  => '⏳ Yapay zeka makaleyi yazıyor (20-60 sn)...',
            'saving'      => 'Kaydediliyor...',
        ] );
    }

    public function handle_settings_save() {
        if (
            ! isset( $_POST['hc_save_github'] ) ||
            ! check_admin_referer( 'hc_save_github_settings' ) ||
            ! current_user_can( 'manage_options' )
        ) return;

        $updater = new HC_Github_Updater();
        $updater->save_settings( $_POST );

        wp_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=github&saved=1' ) );
        exit;
    }

    public function render_page() {
        $tab = $_GET['tab'] ?? 'modules';
        ?>
        <div class="wrap hc-wrap">
            <h1>Hesaplama Suite</h1>

            <nav class="nav-tab-wrapper">
                <a href="?page=hesaplama-suite&tab=modules"
                   class="nav-tab <?php echo $tab === 'modules' ? 'nav-tab-active' : ''; ?>">
                    Modüller
                </a>
                <a href="?page=hesaplama-suite&tab=writer"
                   class="nav-tab <?php echo $tab === 'writer' ? 'nav-tab-active' : ''; ?>">
                    ✨ Yazı Oluştur
                </a>
                <a href="?page=hesaplama-suite&tab=ai-settings"
                   class="nav-tab <?php echo $tab === 'ai-settings' ? 'nav-tab-active' : ''; ?>">
                    AI Ayarları
                </a>
                <a href="?page=hesaplama-suite&tab=github"
                   class="nav-tab <?php echo $tab === 'github' ? 'nav-tab-active' : ''; ?>">
                    GitHub Ayarları
                </a>
            </nav>

            <div class="hc-tab-content">
                <?php
                $writer = new HC_AI_Writer();
                if ( $tab === 'github' )      $this->render_github_tab();
                elseif ( $tab === 'writer' )  $writer->render_writer_tab();
                elseif ( $tab === 'ai-settings' ) $writer->render_ai_settings_tab();
                else                          $this->render_modules_tab();
                ?>
            </div>
        </div>
        <?php
    }

    private function render_github_tab() {
        $updater  = new HC_Github_Updater();
        $settings = $updater->get_settings();
        $saved    = isset( $_GET['saved'] );
        $update   = $_GET['update'] ?? '';
        $last     = get_option( 'hc_last_update', '-' );
        ?>
        <?php if ( $saved ): ?>
            <div class="notice notice-success is-dismissible"><p>Ayarlar kaydedildi.</p></div>
        <?php endif; ?>
        <?php if ( $update === 'success' ): ?>
            <div class="notice notice-success is-dismissible"><p>✓ Eklenti GitHub'dan başarıyla güncellendi.</p></div>
        <?php elseif ( $update ): ?>
            <div class="notice notice-error is-dismissible"><p>Güncelleme hatası: <?php echo esc_html( urldecode( $update ) ); ?></p></div>
        <?php endif; ?>

        <div class="hc-card">
            <h2>GitHub Bağlantısı</h2>

            <form method="post">
                <?php wp_nonce_field( 'hc_save_github_settings' ); ?>

                <table class="form-table">
                    <tr>
                        <th><label for="repo">Repository</label></th>
                        <td>
                            <input type="text" id="repo" name="repo"
                                   value="<?php echo esc_attr( $settings['repo'] ); ?>"
                                   placeholder="kullanici-adi/hesaplama-wp-addons"
                                   class="regular-text" />
                            <p class="description">GitHub kullanıcı adı / repo adı</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="branch">Branch</label></th>
                        <td>
                            <input type="text" id="branch" name="branch"
                                   value="<?php echo esc_attr( $settings['branch'] ); ?>"
                                   placeholder="main"
                                   class="small-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="token">Token (opsiyonel)</label></th>
                        <td>
                            <input type="password" id="token" name="token"
                                   value="<?php echo esc_attr( $settings['token'] ); ?>"
                                   placeholder="ghp_xxxx — private repo için"
                                   class="regular-text" />
                            <p class="description">Public repo için boş bırakın.</p>
                        </td>
                    </tr>
                </table>

                <p class="submit">
                    <button type="submit" name="hc_save_github" class="button button-primary">
                        Kaydet
                    </button>
                    <button type="button" id="hc-check-version" class="button">
                        Son Versiyonu Kontrol Et
                    </button>
                    <span id="hc-version-result" style="margin-left:10px; line-height:30px;"></span>
                </p>
            </form>
        </div>

        <div class="hc-card hc-update-box">
            <h2>Güncelleme</h2>
            <p>Son güncelleme: <strong><?php echo esc_html( $last ); ?></strong></p>
            <p>GitHub'daki son kodu çekip eklentiyi günceller. Sayfa yeniden yüklenir.</p>

            <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
                <?php wp_nonce_field( 'hc_update_from_github' ); ?>
                <input type="hidden" name="action" value="hc_update_from_github" />
                <button type="submit" class="button button-primary hc-update-btn"
                        onclick="return confirm('GitHub dan guncellemek istediginize emin misiniz?')">
                    &#8595; GitHub&apos;dan G&uuml;ncelle
                </button>
            </form>
        </div>
        <?php
    }

    private function render_modules_tab() {
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        $modules     = [];
        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                $slug = basename( $path );
                $meta_file = $path . '/meta.json';
                $meta = file_exists( $meta_file )
                    ? json_decode( file_get_contents( $meta_file ), true )
                    : [];
                $modules[] = [
                    'slug'      => $slug,
                    'name'      => $meta['name']      ?? $slug,
                    'shortcode' => '[hc_' . str_replace( '-', '_', $slug ) . ']',
                    'desc'      => $meta['desc']      ?? '',
                ];
            }
        }
        ?>
        <div class="hc-card">
            <h2>Aktif Modüller</h2>
            <?php if ( empty( $modules ) ): ?>
                <p>Henüz modül yok. <code>modules/</code> klasörüne hesap makinesi ekleyin.</p>
            <?php else: ?>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th>Hesap Makinesi</th>
                            <th>Shortcode</th>
                            <th>Açıklama</th>
                            <th style="width:130px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $modules as $m ): ?>
                        <tr>
                            <td><strong><?php echo esc_html( $m['name'] ); ?></strong></td>
                            <td><code><?php echo esc_html( $m['shortcode'] ); ?></code></td>
                            <td><?php echo esc_html( $m['desc'] ); ?></td>
                            <td>
                                <button
                                    class="button hc-yazi-ekle-btn"
                                    data-name="<?php echo esc_attr( $m['name'] ); ?>"
                                    data-shortcode="<?php echo esc_attr( $m['shortcode'] ); ?>"
                                    data-nonce="<?php echo esc_attr( wp_create_nonce( 'hc_ajax_nonce' ) ); ?>">
                                    + Yazı Ekle
                                </button>
                                <span class="hc-yazi-ekle-msg" style="display:none; font-size:12px; color:#666;"></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <?php
    }
}
