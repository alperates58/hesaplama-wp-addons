<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akim_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-current-conv',
        HC_PLUGIN_URL . 'modules/akim-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-current-box">
        <h3>Akım Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-current-input" value="1" oninput="hcCurrentConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-current-from" onchange="hcCurrentConvert()">
                <option value="a">Amper (A)</option>
                <option value="ma">Miliamper (mA)</option>
                <option value="ua">Mikroamper (µA)</option>
                <option value="ka">Kiloamper (kA)</option>
                <option value="ma2">Megaamper (MA)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-current-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
