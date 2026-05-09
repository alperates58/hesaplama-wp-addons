<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilowatt_beygir_gucu_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kw-hp-conv',
        HC_PLUGIN_URL . 'modules/kilowatt-beygir-gucu-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kwhp-box">
        <h3>Kilowatt Beygir Gücü Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Kilowatt (kW)</label>
            <input type="number" id="hc-kwhp-kw" value="100" oninput="hcKwToHp()">
        </div>
        <div class="hc-form-group">
            <label>Beygir Gücü (HP/PS)</label>
            <input type="number" id="hc-kwhp-hp" value="135.96" oninput="hcHpToKw()">
        </div>
        <div class="hc-result visible">
            <p id="hc-kwhp-info" style="font-size: 0.9em; color: #666;">
                * 1 kW ≈ 1,36 Metrik Beygir Gücü (PS) baz alınmıştır.
            </p>
        </div>
    </div>
    <?php
}
