<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-rho-conv',
        HC_PLUGIN_URL . 'modules/yogunluk-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rho-box">
        <h3>Yoğunluk Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-rho-input" value="1000" oninput="hcRhoConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-rho-from" onchange="hcRhoConvert()">
                <option value="kgm3">kg/m³</option>
                <option value="gcm3">g/cm³ (veya kg/L)</option>
                <option value="lbft3">lb/ft³</option>
                <option value="gl">g/L</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-rho-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
