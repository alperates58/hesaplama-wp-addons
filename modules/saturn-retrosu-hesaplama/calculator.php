<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saturn_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saturn-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/saturn-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saturn-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/saturn-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saturn-retro">
        <h3>Satürn Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sr-date">Tarih Seçin:</label>
            <input type="date" id="hc-sr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcSaturnRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-saturn-retro-result">
            <div id="hc-sr-status" class="hc-sr-status"></div>
            <div id="hc-sr-desc" class="hc-sr-desc"></div>
        </div>
    </div>
    <?php
}
