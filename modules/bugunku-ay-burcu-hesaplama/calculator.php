<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bugunku_ay_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bugunku-ay-burcu-hesaplama',
        HC_PLUGIN_URL . 'modules/bugunku-ay-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bugunku-ay-burcu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bugunku-ay-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-today-moon">
        <h3>Bugünkü Ay Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tm-date">Tarih Seçin:</label>
            <input type="date" id="hc-tm-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcTodayMoonSignHesapla()">Ay Burcunu Hesapla</button>
        <div class="hc-result" id="hc-today-moon-result">
            <div class="hc-tm-value" id="hc-tm-val">-</div>
            <div id="hc-tm-desc" class="hc-tm-desc"></div>
        </div>
    </div>
    <?php
}
