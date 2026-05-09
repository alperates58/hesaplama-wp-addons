<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_torku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-motor-torque',
        HC_PLUGIN_URL . 'modules/motor-torku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mt-box">
        <h3>Motor Torku Hesaplama</h3>
        <div class="hc-form-group">
            <label>Beygir Gücü (HP)</label>
            <input type="number" id="hc-mt-hp" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label>Devir (RPM)</label>
            <input type="number" id="hc-mt-rpm" placeholder="5252">
        </div>
        <button class="hc-btn" onclick="hcMtHesapla()">Torku Hesapla</button>
        <div class="hc-result" id="hc-mt-result">
            <div class="hc-result-title">Motor Torku:</div>
            <div class="hc-result-value" id="hc-mt-val">-</div>
            <p style="font-size: 0.8em; color: #888;">* Tork (Nm) = (HP * 7127) / RPM formülü kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
