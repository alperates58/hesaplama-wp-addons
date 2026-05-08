<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_unix_zamani_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-unix-conv',
        HC_PLUGIN_URL . 'modules/unix-zamani-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-unix-box">
        <h3>Unix Zamanı Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Unix Zaman Damgası (Saniye)</label>
            <input type="number" id="hc-unix-val" value="1735689600" oninput="hcUnixToDate()">
        </div>
        <div class="hc-form-group">
            <label>Tarih ve Saat</label>
            <input type="datetime-local" id="hc-unix-date" oninput="hcDateToUnix()">
        </div>
        <div class="hc-result visible">
            <div id="hc-unix-res-text">-</div>
        </div>
    </div>
    <?php
}
