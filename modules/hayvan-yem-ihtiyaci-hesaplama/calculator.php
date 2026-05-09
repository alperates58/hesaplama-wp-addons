<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hayvan_yem_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hayvan-yem-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/hayvan-yem-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hayvan-yem-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hayvan-yem-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hayvan-yem-ihtiyaci-hesaplama">
        <h3>Hayvan Yem İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-feed-weight">Hayvan Canlı Ağırlığı (kg)</label>
            <input type="number" id="hc-feed-weight" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-feed-percent">Kuru Madde Tüketim Oranı (%)</label>
            <input type="number" id="hc-feed-percent" placeholder="Örn: 3 (Sığırlar için genelde 2.5-3.5)" step="any" value="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-feed-dm">Kullanılan Yemin Kuru Maddesi (%)</label>
            <input type="number" id="hc-feed-dm" placeholder="Örn: 88 (Kesif yem), 30 (Silaj)" step="any" value="90">
        </div>
        <button class="hc-btn" onclick="hcHayvanYemHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-feed-result">
            <div class="hc-feed-grid">
                <div class="hc-feed-item">
                    <span class="hc-result-label">Günlük KM İhtiyacı:</span>
                    <span class="hc-result-value" id="hc-feed-km-val">-</span>
                </div>
                <div class="hc-feed-item">
                    <span class="hc-result-label">Günlük Toplam Yem:</span>
                    <span class="hc-result-value" id="hc-feed-total-val">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
