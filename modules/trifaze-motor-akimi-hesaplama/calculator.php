<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trifaze_motor_akimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-three-phase-amp',
        HC_PLUGIN_URL . 'modules/trifaze-motor-akimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-three-phase-amp-css',
        HC_PLUGIN_URL . 'modules/trifaze-motor-akimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-three-phase-amp">
        <h3>Trifaze Motor Akımı</h3>
        <div class="hc-form-group">
            <label for="hc-tma-p">Motor Gücü (P) [kW]</label>
            <input type="number" id="hc-tma-p" value="11">
        </div>
        <div class="hc-form-group">
            <label for="hc-tma-v">Gerilim (V) [Volt]</label>
            <input type="number" id="hc-tma-v" value="400">
        </div>
        <div class="hc-form-group">
            <label for="hc-tma-pf">Güç Faktörü (cosφ)</label>
            <input type="number" id="hc-tma-pf" value="0.85" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-tma-eff">Motor Verimi (η) [%]</label>
            <input type="number" id="hc-tma-eff" value="90">
        </div>
        <button class="hc-btn" onclick="hcThreePhaseAmpHesapla()">Akımı Hesapla</button>
        <div class="hc-result" id="hc-three-phase-amp-result">
            <div class="hc-result-item">
                <span>Hat Akımı (I):</span>
                <span class="hc-result-value" id="hc-res-tma-val">0 A</span>
            </div>
            <p class="hc-tma-note">I = P / (√3 * V * cosφ * η)</p>
        </div>
    </div>
    <?php
}
