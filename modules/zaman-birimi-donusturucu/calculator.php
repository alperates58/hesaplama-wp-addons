<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zaman_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-time-conv',
        HC_PLUGIN_URL . 'modules/zaman-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-time-box">
        <h3>Zaman Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-time-input" value="1" oninput="hcTimeConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-time-from" onchange="hcTimeConvert()">
                <option value="s">Saniye (s)</option>
                <option value="min">Dakika (min)</option>
                <option value="h">Saat (h)</option>
                <option value="d">Gün (d)</option>
                <option value="w">Hafta (w)</option>
                <option value="mo">Ay (mo - 30 gün)</option>
                <option value="y">Yıl (y - 365 gün)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-time-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
