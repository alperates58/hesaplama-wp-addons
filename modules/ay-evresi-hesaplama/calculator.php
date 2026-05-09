<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_evresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moon-phase',
        HC_PLUGIN_URL . 'modules/ay-evresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moon-phase-css',
        HC_PLUGIN_URL . 'modules/ay-evresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-evresi-hesaplama">
        <h3>Ay Evresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ay-date">Tarih Seçin</label>
            <input type="date" id="hc-ay-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcAyEvresiHesapla()">Evreyi Hesapla</button>
        <div class="hc-result" id="hc-ay-result">
            <div class="hc-result-label">Ay'ın Durumu:</div>
            <div class="hc-result-value" id="hc-ay-val"></div>
            <div class="hc-result-desc" id="hc-ay-desc"></div>
        </div>
    </div>
    <?php
}
