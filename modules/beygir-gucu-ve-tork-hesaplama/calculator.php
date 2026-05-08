<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beygir_gucu_ve_tork_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hp-torque-calc',
        HC_PLUGIN_URL . 'modules/beygir-gucu-ve-tork-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ht-box">
        <h3>Beygir Gücü ve Tork İlişkisi</h3>
        <div class="hc-form-group">
            <label>Tork (Nm)</label>
            <input type="number" id="hc-ht-torque" placeholder="250">
        </div>
        <div class="hc-form-group">
            <label>Devir (RPM)</label>
            <input type="number" id="hc-ht-rpm" placeholder="5252">
        </div>
        <button class="hc-btn" onclick="hcHtHesapla()">Gücü Hesapla (HP)</button>
        <div class="hc-result" id="hc-ht-result">
            <div class="hc-result-title">Hesaplanan Güç:</div>
            <div class="hc-result-value" id="hc-ht-val">-</div>
        </div>
    </div>
    <?php
}
