<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_gucu_beygir_hp_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-power-conv',
        HC_PLUGIN_URL . 'modules/motor-gucu-beygir-hp-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pwr-box">
        <h3>Motor Gücü Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Güç (HP - Beygir)</label>
            <input type="number" id="hc-pwr-input-hp" value="100" oninput="hcPwrConvert('hp')">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>kW:</strong><br><span id="hc-pwr-kw">-</span></div>
                <div><strong>PS (Metrik Beygir):</strong><br><span id="hc-pwr-ps">-</span></div>
                <div><strong>BHP:</strong><br><span id="hc-pwr-bhp">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
