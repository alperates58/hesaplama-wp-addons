<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mars_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mars-retrosu-hesaplama',
        HC_PLUGIN_URL . 'modules/mars-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mars-retrosu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mars-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mars-retro">
        <h3>Mars Retrosu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mr-date">Tarih Seçin:</label>
            <input type="date" id="hc-mr-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcMarsRetrosuHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-mars-retro-result">
            <div id="hc-mr-status" class="hc-mr-status"></div>
            <div id="hc-mr-desc" class="hc-mr-desc"></div>
        </div>
    </div>
    <?php
}
