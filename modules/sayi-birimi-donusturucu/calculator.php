<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayi_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-base-conv',
        HC_PLUGIN_URL . 'modules/sayi-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-base-box">
        <h3>Sayı Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Sayı</label>
            <input type="text" id="hc-base-input" value="10" oninput="hcBaseConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Taban</label>
            <select id="hc-base-from" onchange="hcBaseConvert()">
                <option value="10">Onluk (Decimal)</option>
                <option value="2">İkilik (Binary)</option>
                <option value="16">Onaltılık (Hex)</option>
                <option value="8">Sekizlik (Octal)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-base-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
