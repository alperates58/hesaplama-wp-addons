<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_fazi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moon-phase-alt',
        HC_PLUGIN_URL . 'modules/ay-fazi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moon-phase-alt-css',
        HC_PLUGIN_URL . 'modules/ay-fazi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-fazi-hesaplama">
        <h3>Ay Fazı Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-ay-date-alt">Tarih Seçin</label>
            <input type="date" id="hc-ay-date-alt" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcAyFaziHesapla()">Fazı Hesapla</button>
        <div class="hc-result" id="hc-ay-result-alt">
            <div class="hc-result-label">Mevcut Ay Fazı:</div>
            <div class="hc-result-value" id="hc-ay-val-alt"></div>
            <div class="hc-result-desc" id="hc-ay-desc-alt"></div>
        </div>
    </div>
    <?php
}
