<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_sertligi_kahve_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-hardness-coffee',
        HC_PLUGIN_URL . 'modules/su-sertligi-kahve-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hardness-coffee-calc">
        <h3>Su Sertliği ve Kahve</h3>
        <div class="hc-form-group">
            <label for="hc-wh-val">Su Sertliği (PPM):</label>
            <input type="number" id="hc-wh-val" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcWaterHardnessCoffeeHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-hardness-coffee-result">
            <strong>Analiz Sonucu:</strong>
            <div id="hc-wh-res" class="hc-result-value">-</div>
            <p id="hc-wh-info"></p>
        </div>
    </div>
    <?php
}
