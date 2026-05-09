<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-rho-conv-v2',
        HC_PLUGIN_URL . 'modules/yogunluk-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rho2-box">
        <h3>Yoğunluk Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-rho2-input" value="1000" oninput="hcRho2Convert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-rho2-from" onchange="hcRho2Convert()">
                <option value="kgm3">kg/m³</option>
                <option value="gcm3">g/cm³</option>
                <option value="lbft3">lb/ft³</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-rho2-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
