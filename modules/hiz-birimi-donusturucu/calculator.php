<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiz_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-speed-conv',
        HC_PLUGIN_URL . 'modules/hiz-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-speed-box">
        <h3>Hız Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-speed-input" value="100" oninput="hcSpeedConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-speed-from" onchange="hcSpeedConvert()">
                <option value="kmh">km/sa (Kilometre/Saat)</option>
                <option value="ms">m/s (Metre/Saniye)</option>
                <option value="mph">mil/sa (MPH)</option>
                <option value="knot">Knot (Deniz Mili/Saat)</option>
                <option value="mach">Mach (Ses Hızı)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-speed-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
