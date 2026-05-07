<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_birakma_tasarruf( $atts ) {
    wp_enqueue_script(
        'hc-sigara-birakma-tasarruf',
        HC_PLUGIN_URL . 'modules/sigara-birakma-tasarruf/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigara-birakma-tasarruf-css',
        HC_PLUGIN_URL . 'modules/sigara-birakma-tasarruf/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sigara-birakma-tasarruf">
        <div class="hc-header">
            <h3>Sigara Bırakma ve Tasarruf Hesaplayıcı</h3>
            <p>Bıraktığınızda kazanacağınız sağlığı ve tasarruf edeceğiniz parayı görün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-sigara-adet">Günde Kaç Adet Sigara?</label>
                <input type="number" id="hc-sigara-adet" placeholder="Örn: 20" min="1" value="20">
            </div>

            <div class="hc-form-group">
                <label for="hc-paket-fiyat">Bir Paket Sigara Fiyatı (TL)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-paket-fiyat" placeholder="Örn: 105" min="1" value="105">
                    <span class="hc-input-icon">₺</span>
                </div>
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-birakma-tarihi">Sigarayı Bırakma Tarihi (Opsiyonel)</label>
                <input type="date" id="hc-birakma-tarihi" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSigaraHesapla()">
            <span>Kazanımlarımı Hesapla</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z"/></svg>
        </button>

        <div class="hc-result" id="hc-sigara-result">
            <div class="hc-result-header">Finansal Kazanımlar</div>
            <div class="hc-savings-grid">
                <div class="hc-saving-card">
                    <span class="hc-label">Haftalık</span>
                    <strong id="hc-res-hafta">0 ₺</strong>
                </div>
                <div class="hc-saving-card">
                    <span class="hc-label">Aylık</span>
                    <strong id="hc-res-ay">0 ₺</strong>
                </div>
                <div class="hc-saving-card primary">
                    <span class="hc-label">Yıllık</span>
                    <strong id="hc-res-yil">0 ₺</strong>
                </div>
                <div class="hc-saving-card">
                    <span class="hc-label">10 Yıllık</span>
                    <strong id="hc-res-10yil">0 ₺</strong>
                </div>
            </div>

            <div class="hc-result-header">Geri Kazanılan Zaman</div>
            <div class="hc-time-display">
                <div class="hc-time-item">
                    <span id="hc-res-zaman">0 gün, 0 saat</span>
                    <small>Yıllık sigara içmek için harcanan süre</small>
                </div>
            </div>

            <div class="hc-result-header">Sağlık Takvimi</div>
            <div class="hc-health-timeline" id="hc-health-timeline">
                <!-- JS ile dolacak -->
            </div>
        </div>
    </div>
    <?php
}
