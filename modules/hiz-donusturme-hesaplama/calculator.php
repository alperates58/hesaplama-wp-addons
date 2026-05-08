<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiz_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-speed-conv-v2',
        HC_PLUGIN_URL . 'modules/hiz-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-speed2-box">
        <h3>Hız Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-speed2-input" value="100" oninput="hcSpeed2Convert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-speed2-from" onchange="hcSpeed2Convert()">
                <option value="kmh">km/sa (Kilometre/Saat)</option>
                <option value="ms">m/s (Metre/Saniye)</option>
                <option value="mph">mil/sa (MPH)</option>
                <option value="knot">Knot</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-speed2-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
