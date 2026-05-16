<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hilal_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hilal-hesaplama',
        HC_PLUGIN_URL . 'modules/hilal-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hilal-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hilal-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-crescent">
        <h3>Hilal Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hil-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-hil-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcHilalHesapla()">Hilal Görünürlüğünü Hesapla</button>
        <div class="hc-result" id="hc-hilal-result">
            <div id="hc-hil-status" class="hc-hil-status"></div>
            <div id="hc-hil-info" class="hc-hil-info"></div>
        </div>
    </div>
    <?php
}
