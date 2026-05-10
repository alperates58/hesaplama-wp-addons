<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_bezi_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-bezi-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/bebek-bezi-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-bezi-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bebek-bezi-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-diaper">
        <h3>Bebek Bezi İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-dp-age">Bebeğin Yaşı (Ay)</label>
            <input type="number" id="hc-dp-age" value="3" min="0">
        </div>
        <button class="hc-btn" onclick="hcBebekBeziİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dp-result">
            <div class="hc-result-label">Aylık Tahmini İhtiyaç:</div>
            <div class="hc-result-value" id="hc-dp-val">-</div>
            <p id="hc-dp-daily" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
