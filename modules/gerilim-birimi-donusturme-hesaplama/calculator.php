<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilim_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-volt-conv',
        HC_PLUGIN_URL . 'modules/gerilim-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-volt-box">
        <h3>Gerilim Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-volt-input" value="1" oninput="hcVoltConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-volt-from" onchange="hcVoltConvert()">
                <option value="v">Volt (V)</option>
                <option value="mv">Milivolt (mV)</option>
                <option value="uv">Mikrovolt (µV)</option>
                <option value="kv">Kilovolt (kV)</option>
                <option value="mv2">Megavolt (MV)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-volt-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
