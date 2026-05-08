<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_galon_litre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-gal-l-conv',
        HC_PLUGIN_URL . 'modules/galon-litre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gall-box">
        <h3>Galon Litre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Galon (US)</label>
            <input type="number" id="hc-gall-gal" value="1" oninput="hcGalToL()">
        </div>
        <div class="hc-form-group">
            <label>Litre (L)</label>
            <input type="number" id="hc-gall-l" value="3.785" oninput="hcLToGal()">
        </div>
    </div>
    <?php
}
