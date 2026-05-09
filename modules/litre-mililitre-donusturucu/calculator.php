<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_litre_mililitre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-l-ml-conv',
        HC_PLUGIN_URL . 'modules/litre-mililitre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lml-box">
        <h3>Litre Mililitre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Litre (L)</label>
            <input type="number" id="hc-lml-l" value="1" oninput="hcLToMl()">
        </div>
        <div class="hc-form-group">
            <label>Mililitre (mL)</label>
            <input type="number" id="hc-lml-ml" value="1000" oninput="hcMlToL()">
        </div>
    </div>
    <?php
}
