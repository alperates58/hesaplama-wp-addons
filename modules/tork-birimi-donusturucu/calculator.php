<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tork_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-torque-conv',
        HC_PLUGIN_URL . 'modules/tork-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-torque-box">
        <h3>Tork Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-torque-input" value="100" oninput="hcTorqueConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-torque-from" onchange="hcTorqueConvert()">
                <option value="nm">Newton-metre (Nm)</option>
                <option value="kgm">Kilogram-metre (kgm)</option>
                <option value="lbft">Pound-foot (lb-ft)</option>
                <option value="lbin">Pound-inch (lb-in)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-torque-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
