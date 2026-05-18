<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_dusme_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-dusme-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-dusme-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-dusme-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-dusme-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-dusme-mesafesi-hesaplama">
        <div class="hc-cal-header">
            <h3>Serbest Düşme Mesafesi Hesaplama</h3>
            <p>Sürtünmesiz bir ortamda, serbest düşüşe bırakılan bir cismin, girilen süre (t) sonunda katettiği dikey mesafeyi hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sdm-t">Düşme Süresi (saniye - s)</label>
            <input type="number" id="hc-sdm-t" class="hc-input" placeholder="örn. 5" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sdm-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-sdm-g" class="hc-input" value="9.80665" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSerbestDusmeMesafesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-serbest-dusme-mesafesi-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Düşüş Mesafesi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Metre (m):</span>
                <span class="hc-result-value" id="hc-sdm-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilometre (km):</span>
                <span class="hc-result-value" id="hc-sdm-res-km">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sdm-desc"></div>
        </div>
    </div>
    <?php
}
