<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aerosol_itici_gaz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aerosol-itici-gaz-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/aerosol-itici-gaz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aerosol-itici-gaz-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aerosol-itici-gaz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aerosol-itici-gaz-orani-hesaplama">
        <h3>Aerosol İtici Gaz Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aerosol-toplam-agirlik">Toplam Ürün Ağırlığı (kg):</label>
            <input type="number" id="hc-aerosol-toplam-agirlik" placeholder="kg" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-aerosol-gaz-orani">İtici Gaz Oranı (%):</label>
            <input type="number" id="hc-aerosol-gaz-orani" placeholder="%" step="any" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcAerosolIticiGazOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aerosol-result">
            <div id="hc-aerosol-result-text"></div>
        </div>
    </div>
    <?php
}
