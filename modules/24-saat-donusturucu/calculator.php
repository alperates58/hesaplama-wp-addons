<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_24_saat_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-24h-conv',
        HC_PLUGIN_URL . 'modules/24-saat-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-24h-box">
        <h3>24 Saat Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>24 Saatlik Format</label>
            <input type="time" id="hc-24h-val" value="14:30" oninput="hc24To12()">
        </div>
        <div class="hc-form-group">
            <label>12 Saatlik Format (AM/PM)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-12h-hr" value="2" min="1" max="12" style="width: 60px;" oninput="hc12To24()">
                <input type="number" id="hc-12h-min" value="30" min="0" max="59" style="width: 60px;" oninput="hc12To24()">
                <select id="hc-12h-ampm" onchange="hc12To24()">
                    <option value="AM">AM</option>
                    <option value="PM" selected>PM</option>
                </select>
            </div>
        </div>
    </div>
    <?php
}
