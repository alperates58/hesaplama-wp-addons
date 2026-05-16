<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_tutulmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-tutulmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-tutulmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-tutulmasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-tutulmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lunar-eclipse">
        <h3>Ay Tutulması Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-le-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-le-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcLunarEclipseHesapla()">Sıradaki Ay Tutulmasını Bul</button>
        <div class="hc-result" id="hc-lunar-eclipse-result">
            <div class="hc-le-value" id="hc-le-val">-</div>
            <div id="hc-le-desc" class="hc-le-desc"></div>
        </div>
    </div>
    <?php
}
