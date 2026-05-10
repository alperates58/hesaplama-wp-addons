<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zeytinyagi_asitlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olive-oil-acidity',
        HC_PLUGIN_URL . 'modules/zeytinyagi-asitlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-olive-acidity-calc">
        <h3>Zeytinyağı Kalite Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-oa-val">Asitlik Oranı (%):</label>
            <input type="number" id="hc-oa-val" placeholder="0.8" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcOliveOilAcidityHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-olive-acidity-result">
            <strong>Kalite Sınıfı:</strong>
            <div id="hc-oa-res" class="hc-result-value">-</div>
            <p id="hc-oa-info"></p>
        </div>
    </div>
    <?php
}
