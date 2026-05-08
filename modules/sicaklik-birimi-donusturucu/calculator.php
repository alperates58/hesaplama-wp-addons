<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sicaklik_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-temp-conv',
        HC_PLUGIN_URL . 'modules/sicaklik-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-temp-box">
        <h3>Sıcaklık Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-temp-input" value="0" oninput="hcTempConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-temp-from" onchange="hcTempConvert()">
                <option value="c">Celsius (°C)</option>
                <option value="f">Fahrenheit (°F)</option>
                <option value="k">Kelvin (K)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-temp-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
