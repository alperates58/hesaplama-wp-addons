<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_dusme_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-dusme-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-dusme-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-dusme-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-dusme-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-dusme-hizi-hesaplama">
        <div class="hc-cal-header">
            <h3>Serbest Düşme Hızı Hesaplama</h3>
            <p>Hava direncinin olmadığı bir ortamda, belirli bir yükseklikten (h) bırakılan nesnenin yere çarptığı andaki hızını hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sdh-h">Bırakılan Yükseklik (metre - m)</label>
            <input type="number" id="hc-sdh-h" class="hc-input" placeholder="örn. 20" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sdh-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-sdh-g" class="hc-input" value="9.80665" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSerbestDusmeHiziHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-serbest-dusme-hizi-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Çarpma Hızı</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Metre / Saniye (m/s):</span>
                <span class="hc-result-value" id="hc-sdh-res-ms">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilometre / Saat (km/sa):</span>
                <span class="hc-result-value" id="hc-sdh-res-kmh">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sdh-desc"></div>
        </div>
    </div>
    <?php
}
