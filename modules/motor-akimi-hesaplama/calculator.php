<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_akimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-motor-akim',
        HC_PLUGIN_URL . 'modules/motor-akimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-motor-akim">
        <h3>Motor Akımı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Motor Tipi</label>
            <select id="hc-ma-type">
                <option value="1">Tek Fazlı (Single Phase)</option>
                <option value="3">Üç Fazlı (Three Phase)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ma-power">Güç (Watt - W)</label>
            <input type="number" id="hc-ma-power" placeholder="P" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ma-voltage">Gerilim (Volt - V)</label>
            <input type="number" id="hc-ma-voltage" placeholder="V" step="any" value="230">
        </div>

        <div class="hc-form-group">
            <label for="hc-ma-pf">Güç Faktörü (cos φ)</label>
            <input type="number" id="hc-ma-pf" placeholder="0.85" step="0.01" value="0.85">
        </div>

        <div class="hc-form-group">
            <label for="hc-ma-eff">Verimlilik (η - 0 ile 1 arası)</label>
            <input type="number" id="hc-ma-eff" placeholder="0.90" step="0.01" value="0.90">
        </div>

        <button class="hc-btn" onclick="hcMotorAkimHesapla()">Akımı Hesapla</button>

        <div class="hc-result" id="hc-ma-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Tahmini Motor Akımı (I):</span>
                <span class="hc-result-value" id="hc-ma-res-total">--</span>
                <span class="hc-result-unit">Amper (A)</span>
            </div>
        </div>
    </div>
    <?php
}
