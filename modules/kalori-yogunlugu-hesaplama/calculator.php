<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalori_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cal-density',
        HC_PLUGIN_URL . 'modules/kalori-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cal-density">
        <h3>Kalori Yoğunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Porsiyon Enerjisi (kcal)</label>
            <input type="number" id="hc-cd-cal" placeholder="kcal" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Porsiyon Ağırlığı (gram)</label>
            <input type="number" id="hc-cd-weight" placeholder="g" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcCalDensityHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cd-result">
            <span>Kalori Yoğunluğu:</span>
            <div class="hc-result-value" id="hc-cd-res-val">0 kcal/g</div>
            <div id="hc-cd-res-desc" style="margin-top:10px; font-weight:bold; text-align:center;">-</div>
        </div>
    </div>
    <?php
}
