<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekup_litre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-m3-l-conv',
        HC_PLUGIN_URL . 'modules/metrekup-litre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-m3l-box">
        <h3>Metreküp Litre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Metreküp (m³)</label>
            <input type="number" id="hc-m3l-m3" value="1" oninput="hcM3ToL()">
        </div>
        <div class="hc-form-group">
            <label>Litre (L)</label>
            <input type="number" id="hc-m3l-l" value="1000" oninput="hcLToM3()">
        </div>
    </div>
    <?php
}
