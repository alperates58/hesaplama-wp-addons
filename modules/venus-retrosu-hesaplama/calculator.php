<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/venus-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venus-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/venus-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venus-retro">
        <h3>Venüs Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vr-date">Tarih Seçin:</label>
            <input type="date" id="hc-vr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcVenusRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-venus-retro-result">
            <div id="hc-vr-status" class="hc-vr-status"></div>
            <div id="hc-vr-desc" class="hc-vr-desc"></div>
        </div>
    </div>
    <?php
}
