<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_santimetrekupten_metrekupe_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cm3-m3-conv',
        HC_PLUGIN_URL . 'modules/santimetrekupten-metrekupe-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cm3m3-box">
        <h3>Santimetreküpten Metreküpe Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Santimetreküp (cm³)</label>
            <input type="number" id="hc-cm3m3-cm3" value="1000000" oninput="hcCm3ToM3()">
        </div>
        <div class="hc-form-group">
            <label>Metreküp (m³)</label>
            <input type="number" id="hc-cm3m3-m3" value="1" oninput="hcM3ToCm3()">
        </div>
    </div>
    <?php
}
