<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-motor-verim',
        HC_PLUGIN_URL . 'modules/motor-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-motor-verim">
        <h3>Motor Verimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mv-in">Giriş Gücü (Watt - W)</label>
            <input type="number" id="hc-mv-in" placeholder="Pin" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mv-out">Çıkış Gücü / Mekanik Güç (Watt - W)</label>
            <input type="number" id="hc-mv-out" placeholder="Pout" step="any">
        </div>

        <button class="hc-btn" onclick="hcMotorVerimHesapla()">Verimi Hesapla</button>

        <div class="hc-result" id="hc-mv-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Motor Verimi (η):</span>
                <span class="hc-result-value" id="hc-mv-res-total">--</span>
                <span class="hc-result-unit">%</span>
            </div>
        </div>
    </div>
    <?php
}
