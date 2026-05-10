<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_kucuk_kareler_regresyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-regression',
        HC_PLUGIN_URL . 'modules/en-kucuk-kareler-regresyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-regression-css',
        HC_PLUGIN_URL . 'modules/en-kucuk-kareler-regresyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-regression">
        <h3>En Küçük Kareler Regresyonu</h3>
        <p style="font-size:0.85rem; margin-bottom:15px;">Veri noktalarını virgülle ayırarak giriniz (x,y; x,y...)</p>
        <div class="hc-form-group">
            <label for="hc-rg-data">Veri Noktaları:</label>
            <textarea id="hc-rg-data" rows="4" placeholder="1,2; 2,3; 3,5; 4,4; 5,6"></textarea>
        </div>
        <button class="hc-btn" onclick="hcRegressionHesapla()">Regresyonu Hesapla</button>
        <div class="hc-result" id="hc-regression-result">
            <strong>Doğru Denklemi:</strong>
            <div id="hc-rg-res-val" class="hc-result-value">-</div>
            <p id="hc-rg-res-r2" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
