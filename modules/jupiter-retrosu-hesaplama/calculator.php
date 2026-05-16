<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jupiter_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jupiter-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/jupiter-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jupiter-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/jupiter-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jupiter-retro">
        <h3>Jüpiter Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-jr-date">Tarih Seçin:</label>
            <input type="date" id="hc-jr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcJupiterRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-jupiter-retro-result">
            <div id="hc-jr-status" class="hc-jr-status"></div>
            <div id="hc-jr-desc" class="hc-jr-desc"></div>
        </div>
    </div>
    <?php
}
