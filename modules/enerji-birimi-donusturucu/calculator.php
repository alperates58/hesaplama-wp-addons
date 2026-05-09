<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-energy-conv',
        HC_PLUGIN_URL . 'modules/enerji-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-energy-box">
        <h3>Enerji Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-energy-input" value="1" oninput="hcEnergyConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-energy-from" onchange="hcEnergyConvert()">
                <option value="j">Joule (J)</option>
                <option value="kj">Kilojoule (kJ)</option>
                <option value="cal">Kalori (cal)</option>
                <option value="kcal">Kilokalori (kcal)</option>
                <option value="wh">Watt-saat (Wh)</option>
                <option value="kwh">Kilowatt-saat (kWh)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-energy-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
