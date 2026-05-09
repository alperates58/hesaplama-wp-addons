<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrik_yuku_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-charge-conv',
        HC_PLUGIN_URL . 'modules/elektrik-yuku-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-charge-box">
        <h3>Elektrik Yükü Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-charge-input" value="1" oninput="hcChargeConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-charge-from" onchange="hcChargeConvert()">
                <option value="c">Coulomb (C)</option>
                <option value="mc">Millicoulomb (mC)</option>
                <option value="uc">Microcoulomb (µC)</option>
                <option value="ah">Ampere-hour (Ah)</option>
                <option value="mah">Milliampere-hour (mAh)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-charge-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <!-- JS will fill this -->
            </div>
        </div>
    </div>
    <?php
}
