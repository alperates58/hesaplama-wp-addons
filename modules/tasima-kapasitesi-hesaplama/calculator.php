<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tasima_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carry-cap',
        HC_PLUGIN_URL . 'modules/tasima-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carry-cap-css',
        HC_PLUGIN_URL . 'modules/tasima-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carry-cap">
        <h3>Taşıma Kapasitesi (K) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cc-area">Alan (Hektar / m²):</label>
            <input type="number" id="hc-cc-area" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-resource">Kaynak Verimliliği (Birey / Birim Alan):</label>
            <input type="number" id="hc-cc-resource" placeholder="5">
            <small>Bir hektarın besleyebileceği maksimum birey sayısı.</small>
        </div>
        <button class="hc-btn" onclick="hcCarryCapHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-carry-cap-result">
            <strong>Tahmini Taşıma Kapasitesi (K):</strong>
            <div id="hc-cc-res-val" class="hc-result-value">-</div>
            <span>Birey</span>
        </div>
    </div>
    <?php
}
