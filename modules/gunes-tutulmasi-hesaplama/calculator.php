<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_tutulmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-tutulmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/gunes-tutulmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunes-tutulmasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunes-tutulmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-eclipse">
        <h3>Güneş Tutulması Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-se-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-se-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcSolarEclipseHesapla()">Sıradaki Güneş Tutulmasını Bul</button>
        <div class="hc-result" id="hc-solar-eclipse-result">
            <div class="hc-se-value" id="hc-se-val">-</div>
            <div id="hc-se-desc" class="hc-se-desc"></div>
        </div>
    </div>
    <?php
}
