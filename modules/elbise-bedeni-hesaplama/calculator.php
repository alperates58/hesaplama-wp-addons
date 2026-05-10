<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elbise_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elbise-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/elbise-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elbise-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/elbise-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dress">
        <h3>Elbise Bedeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dr-bust">Göğüs Çevresi (cm)</label>
            <input type="number" id="hc-dr-bust" placeholder="En geniş yer">
        </div>
        <div class="hc-form-group">
            <label for="hc-dr-waist">Bel Çevresi (cm)</label>
            <input type="number" id="hc-dr-waist" placeholder="En ince yer">
        </div>
        <div class="hc-form-group">
            <label for="hc-dr-hip">Basen Çevresi (cm)</label>
            <input type="number" id="hc-dr-hip" placeholder="En geniş yer">
        </div>
        <button class="hc-btn" onclick="hcElbiseBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-dr-result">
            <div class="hc-result-label">Önerilen Beden (EU/TR):</div>
            <div class="hc-result-value" id="hc-dr-val">-</div>
            <p id="hc-dr-letter" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
