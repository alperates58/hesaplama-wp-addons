<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_termometresi_kalibrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-therm-calib',
        HC_PLUGIN_URL . 'modules/yemek-termometresi-kalibrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-therm-calib-calc">
        <h3>Termometre Kalibrasyonu</h3>
        <div class="hc-form-group">
            <label for="hc-tc-reading">Buzlu Sudaki Ölçüm (°C):</label>
            <input type="number" id="hc-tc-reading" placeholder="0.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcThermCalibHesapla()">Hata Payını Bul</button>
        <div class="hc-result" id="hc-therm-calib-result">
            <strong>Sapma Payı:</strong>
            <div id="hc-tc-val" class="hc-result-value">-</div>
            <p id="hc-tc-info"></p>
        </div>
    </div>
    <?php
}
