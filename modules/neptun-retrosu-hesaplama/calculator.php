<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_neptun_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-neptun-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/neptun-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-neptun-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/neptun-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-neptun-retro">
        <h3>Neptün Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nr-date">Tarih Seçin:</label>
            <input type="date" id="hc-nr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcNeptunRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-neptun-retro-result">
            <div id="hc-nr-status" class="hc-nr-status"></div>
            <div id="hc-nr-desc" class="hc-nr-desc"></div>
        </div>
    </div>
    <?php
}
