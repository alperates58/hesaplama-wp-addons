<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_super_ay_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-super-ay-hesaplama',
        HC_PLUGIN_URL . 'modules/super-ay-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-super-ay-hesaplama-css',
        HC_PLUGIN_URL . 'modules/super-ay-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-supermoon">
        <h3>Süper Ay Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sm-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-sm-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcSuperAyHesapla()">Sıradaki Süper Ayı Bul</button>
        <div class="hc-result" id="hc-super-ay-result">
            <div id="hc-sm-status" class="hc-sm-status"></div>
            <div id="hc-sm-info" class="hc-sm-info"></div>
        </div>
    </div>
    <?php
}
