<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_agirlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pwr-weight',
        HC_PLUGIN_URL . 'modules/guc-agirlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pwo-box">
        <h3>Güç-Ağırlık Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Motor Gücü (HP)</label>
            <input type="number" id="hc-pwo-hp" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label>Araç Ağırlığı (kg)</label>
            <input type="number" id="hc-pwo-kg" placeholder="Örn: 1300">
        </div>
        <button class="hc-btn" onclick="hcPwoHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-pwo-result">
            <div class="hc-result-title">Performans Oranı:</div>
            <div class="hc-result-value" id="hc-pwo-val">-</div>
            <div id="hc-pwo-desc" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
