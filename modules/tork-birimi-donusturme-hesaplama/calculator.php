<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tork_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-torque-conv-v2',
        HC_PLUGIN_URL . 'modules/tork-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-torque2-box">
        <h3>Tork Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-torque2-input" value="100" oninput="hcTorque2Convert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-torque2-from" onchange="hcTorque2Convert()">
                <option value="nm">Newton-metre (Nm)</option>
                <option value="kgm">Kilogram-metre (kgm)</option>
                <option value="lbft">Pound-foot (lb-ft)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-torque2-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
