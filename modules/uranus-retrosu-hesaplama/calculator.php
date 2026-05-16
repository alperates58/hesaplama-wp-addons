<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uranus_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uranus-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/uranus-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uranus-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/uranus-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uranus-retro">
        <h3>Uranüs Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ur-date">Tarih Seçin:</label>
            <input type="date" id="hc-ur-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcUranusRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-uranus-retro-result">
            <div id="hc-ur-status" class="hc-ur-status"></div>
            <div id="hc-ur-desc" class="hc-ur-desc"></div>
        </div>
    </div>
    <?php
}
