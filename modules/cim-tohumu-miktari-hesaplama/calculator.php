<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cim_tohumu_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cim-tohumu-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cim-tohumu-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cim-tohumu-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cim-tohumu-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cim-tohumu-miktari-hesaplama">
        <h3>Çim Tohumu Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-grass-area">Ekim Alanı (m²)</label>
            <input type="number" id="hc-grass-area" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-grass-rate">Ekim Sıklığı (g/m²)</label>
            <input type="number" id="hc-grass-rate" placeholder="Örn: 40-50" step="any" value="45">
        </div>
        <button class="hc-btn" onclick="hcCimTohumuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-grass-result">
            <div class="hc-result-label">Gerekli Tohum Miktarı:</div>
            <div class="hc-result-value" id="hc-grass-val">-</div>
            <div class="hc-result-note" id="hc-grass-note"></div>
        </div>
    </div>
    <?php
}
