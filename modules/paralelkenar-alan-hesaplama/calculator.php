<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paralelkenar_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-para-area',
        HC_PLUGIN_URL . 'modules/paralelkenar-alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-para-area">
        <h3>Paralelkenar Alan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pa-base">Taban Uzunluğu (m):</label>
            <input type="number" id="hc-pa-base" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-pa-height">Yükseklik (m):</label>
            <input type="number" id="hc-pa-height" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcParaAreaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-para-area-result">
            <strong>Alan:</strong>
            <div id="hc-pa-res-val" class="hc-result-value">-</div>
            <span>m²</span>
        </div>
    </div>
    <?php
}
