<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_astronomik_birim_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-au-conv',
        HC_PLUGIN_URL . 'modules/astronomik-birim-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-au-box">
        <h3>Astronomik Birim Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-au-input" value="1" oninput="hcAuConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-au-from" onchange="hcAuConvert()">
                <option value="au">Astronomik Birim (AU)</option>
                <option value="km">Kilometre (km)</option>
                <option value="ly">Işık Yılı (ly)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-au-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
