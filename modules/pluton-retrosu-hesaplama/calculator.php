<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pluton_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pluton-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/pluton-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pluton-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pluton-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pluton-retro">
        <h3>Plüton Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pr-date">Tarih Seçin:</label>
            <input type="date" id="hc-pr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcPlutonRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-pluton-retro-result">
            <div id="hc-pr-status" class="hc-pr-status"></div>
            <div id="hc-pr-desc" class="hc-pr-desc"></div>
        </div>
    </div>
    <?php
}
