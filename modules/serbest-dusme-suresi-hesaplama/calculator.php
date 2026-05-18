<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_dusme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-dusme-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-dusme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-dusme-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-dusme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-dusme-suresi-hesaplama">
        <div class="hc-cal-header">
            <h3>Serbest Düşme Süresi Hesaplama</h3>
            <p>Hava direncinin ihmal edildiği bir ortamda, belirli bir yükseklikten (h) bırakılan nesnenin düşüş süresini (t) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sds-h">Yükseklik (metre - m)</label>
            <input type="number" id="hc-sds-h" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sds-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-sds-g" class="hc-input" value="9.80665" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSerbestDusmeSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-serbest-dusme-suresi-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Düşüş Süresi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Süre (saniye - s):</span>
                <span class="hc-result-value" id="hc-sds-res-s">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sds-desc"></div>
        </div>
    </div>
    <?php
}
