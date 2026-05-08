<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacim_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-vol-conv',
        HC_PLUGIN_URL . 'modules/hacim-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vol-box">
        <h3>Hacim Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-vol-input" value="1" oninput="hcVolConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-vol-from" onchange="hcVolConvert()">
                <option value="l">Litre (L)</option>
                <option value="ml">Mililitre (mL)</option>
                <option value="m3">Metreküp (m³)</option>
                <option value="gal_us">Galon (US)</option>
                <option value="gal_uk">Galon (UK)</option>
                <option value="cup">Bardak (US Cup)</option>
                <option value="pint">Pint (US Liquid)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-vol-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
