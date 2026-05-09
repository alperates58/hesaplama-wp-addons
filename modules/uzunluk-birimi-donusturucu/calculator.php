<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzunluk_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-len-conv',
        HC_PLUGIN_URL . 'modules/uzunluk-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-len-box">
        <h3>Uzunluk Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-len-input" value="1" oninput="hcLenConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-len-from" onchange="hcLenConvert()">
                <option value="m">Metre (m)</option>
                <option value="cm">Santimetre (cm)</option>
                <option value="mm">Milimetre (mm)</option>
                <option value="km">Kilometre (km)</option>
                <option value="in">İnç (in)</option>
                <option value="ft">Feet (ft)</option>
                <option value="mi">Mil (mi)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-len-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
