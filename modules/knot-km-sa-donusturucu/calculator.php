<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_knot_km_sa_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-knot-kmh-conv',
        HC_PLUGIN_URL . 'modules/knot-km-sa-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-knkm-box">
        <h3>Knot km/sa Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Knot (kn)</label>
            <input type="number" id="hc-knkm-knot" value="1" oninput="hcKnotToKmh()">
        </div>
        <div class="hc-form-group">
            <label>Kilometre/Saat (km/sa)</label>
            <input type="number" id="hc-knkm-kmh" value="1.852" oninput="hcKmhToKnot()">
        </div>
    </div>
    <?php
}
