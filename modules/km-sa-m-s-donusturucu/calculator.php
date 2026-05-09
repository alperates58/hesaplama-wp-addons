<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_km_sa_m_s_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kmh-ms-conv',
        HC_PLUGIN_URL . 'modules/km-sa-m-s-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kmhms-box">
        <h3>km/sa m/s Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Kilometre/Saat (km/sa)</label>
            <input type="number" id="hc-kmhms-kmh" value="100" oninput="hcKmhToMs()">
        </div>
        <div class="hc-form-group">
            <label>Metre/Saniye (m/s)</label>
            <input type="number" id="hc-kmhms-ms" value="27.78" oninput="hcMsToKmh()">
        </div>
    </div>
    <?php
}
