<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-dongusu-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-dongusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-dongusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-dongusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moon-cycle">
        <h3>Ay Döngüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mc-date">Tarih Seçin:</label>
            <input type="date" id="hc-mc-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcAyDongusuHesapla()">Döngüyü Analiz Et</button>
        <div class="hc-result" id="hc-ay-dongusu-result">
            <div class="hc-mc-progress-container">
                <div class="hc-mc-progress-bar" id="hc-mc-bar"></div>
            </div>
            <div id="hc-mc-stats" class="hc-mc-stats"></div>
        </div>
    </div>
    <?php
}
