<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_corap_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-corap-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/corap-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-corap-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/corap-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-socks">
        <h3>Çorap Bedeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sk-shoe">Ayakkabı Numaranız (EU/TR)</label>
            <input type="number" id="hc-sk-shoe" placeholder="Örn: 42">
        </div>
        <button class="hc-btn" onclick="hcÇorapBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-sk-result">
            <div class="hc-result-label">Önerilen Çorap Bedeni:</div>
            <div class="hc-result-value" id="hc-sk-val">-</div>
        </div>
    </div>
    <?php
}
