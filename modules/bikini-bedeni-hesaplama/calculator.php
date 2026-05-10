<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bikini_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bikini-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/bikini-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bikini-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bikini-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bikini">
        <h3>Bikini Bedeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bk-bust">Göğüs Çevresi (cm)</label>
            <input type="number" id="hc-bk-bust" placeholder="Üst beden için">
        </div>
        <div class="hc-form-group">
            <label for="hc-bk-hip">Basen Çevresi (cm)</label>
            <input type="number" id="hc-bk-hip" placeholder="Alt beden için">
        </div>
        <button class="hc-btn" onclick="hcBikiniBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-bk-result">
            <div class="hc-result-label">Önerilen Bedenler:</div>
            <div class="hc-result-value" id="hc-bk-val">-</div>
        </div>
    </div>
    <?php
}
