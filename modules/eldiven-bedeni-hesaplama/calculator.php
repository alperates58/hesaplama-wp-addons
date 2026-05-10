<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eldiven_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eldiven-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/eldiven-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eldiven-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/eldiven-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-glove">
        <h3>Eldiven Bedeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gv-circ">El Çevresi (cm)</label>
            <input type="number" id="hc-gv-circ" placeholder="Baş parmak hariç avuç çevresi">
        </div>
        <button class="hc-btn" onclick="hcEldivenBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-gv-result">
            <div class="hc-result-label">Önerilen Beden:</div>
            <div class="hc-result-value" id="hc-gv-val">-</div>
        </div>
    </div>
    <?php
}
