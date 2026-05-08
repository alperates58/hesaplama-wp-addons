<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-power-conv',
        HC_PLUGIN_URL . 'modules/guc-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-power-box">
        <h3>Güç Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-power-input" value="1" oninput="hcPowerConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-power-from" onchange="hcPowerConvert()">
                <option value="w">Watt (W)</option>
                <option value="kw">Kilowatt (kW)</option>
                <option value="mw">Megawatt (MW)</option>
                <option value="hp">Beygir Gücü (Metric PS)</option>
                <option value="hp_us">Beygir Gücü (Mechanical HP)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-power-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
