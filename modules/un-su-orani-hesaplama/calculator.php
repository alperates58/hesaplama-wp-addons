<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_un_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hydration-calc',
        HC_PLUGIN_URL . 'modules/un-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hydration-calc-wrapper">
        <h3>Hamur Hidrasyonu (Su Oranı)</h3>
        <div class="hc-form-group">
            <label for="hc-h-flour">Un Miktarı (g):</label>
            <input type="number" id="hc-h-flour" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-h-water">Su Miktarı (ml/g):</label>
            <input type="number" id="hc-h-water" placeholder="350">
        </div>
        <button class="hc-btn" onclick="hcHydrationHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hydration-result">
            <strong>Hidrasyon Oranı:</strong>
            <div id="hc-h-val" class="hc-result-value">-</div>
            <p id="hc-h-info"></p>
        </div>
    </div>
    <?php
}
