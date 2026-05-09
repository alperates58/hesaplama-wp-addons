<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enduktans_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ind-conv',
        HC_PLUGIN_URL . 'modules/enduktans-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ind-box">
        <h3>Endüktans Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-ind-input" value="1" oninput="hcIndConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-ind-from" onchange="hcIndConvert()">
                <option value="h">Henry (H)</option>
                <option value="mh">Milihenry (mH)</option>
                <option value="uh">Mikrohenry (µH)</option>
                <option value="nh">Nanohenry (nH)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-ind-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
