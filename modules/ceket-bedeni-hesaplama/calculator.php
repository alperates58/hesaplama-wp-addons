<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceket_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ceket-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/ceket-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ceket-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ceket-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jacket">
        <h3>Ceket / Blazer Beden Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-jk-bust">Göğüs Çevresi (cm)</label>
            <input type="number" id="hc-jk-bust" placeholder="En geniş yer">
        </div>
        <div class="hc-form-group">
            <label for="hc-jk-shoulder">Omuz Genişliği (cm)</label>
            <input type="number" id="hc-jk-shoulder" placeholder="Omuz başından omuz başına">
        </div>
        <button class="hc-btn" onclick="hcCeketBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-jk-result">
            <div class="hc-result-label">Önerilen Ceket Bedeni:</div>
            <div class="hc-result-value" id="hc-jk-val">-</div>
        </div>
    </div>
    <?php
}
