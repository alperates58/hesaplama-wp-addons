<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_verimliligi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-conv-calc',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-verimliligi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evc-box">
        <h3>EV Verimlilik Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer (kWh/100km)</label>
            <input type="number" step="0.1" id="hc-evc-input-val" value="18" oninput="hcEvcConvert()">
        </div>
        <div class="hc-result visible" id="hc-evc-result-box">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>Wh/km:</strong><br><span id="hc-evc-whkm">-</span></div>
                <div><strong>km/kWh:</strong><br><span id="hc-evc-kmkwh">-</span></div>
                <div><strong>MPGe:</strong><br><span id="hc-evc-mpge">-</span></div>
                <div><strong>mil/kWh:</strong><br><span id="hc-evc-milkwh">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
