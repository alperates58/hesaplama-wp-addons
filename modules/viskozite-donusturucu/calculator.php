<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_viskozite_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-visc-conv',
        HC_PLUGIN_URL . 'modules/viskozite-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-visc-box">
        <h3>Viskozite Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-visc-input" value="1" oninput="hcViscConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-visc-from" onchange="hcViscConvert()">
                <option value="cp">Centipoise (cP)</option>
                <option value="mpas">Milipascal-saniye (mPa·s)</option>
                <option value="pas">Pascal-saniye (Pa·s)</option>
                <option value="p">Poise (P)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-visc-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
