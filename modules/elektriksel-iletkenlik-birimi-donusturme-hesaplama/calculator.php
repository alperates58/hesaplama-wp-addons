<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektriksel_iletkenlik_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cond-conv',
        HC_PLUGIN_URL . 'modules/elektriksel-iletkenlik-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cond-box">
        <h3>Elektriksel İletkenlik Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-cond-input" value="1" oninput="hcCondConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-cond-from" onchange="hcCondConvert()">
                <option value="s">Siemens (S)</option>
                <option value="ms">Milisiemens (mS)</option>
                <option value="us">Mikrosiemens (µS)</option>
                <option value="mho">Mho</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-cond-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
