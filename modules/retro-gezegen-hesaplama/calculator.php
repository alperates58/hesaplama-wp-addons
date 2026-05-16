<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_retro_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retro-gezegen-hesaplama',
        HC_PLUGIN_URL . 'modules/retro-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-retro-gezegen-hesaplama-css',
        HC_PLUGIN_URL . 'modules/retro-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-retro-planets">
        <h3>Retro Gezegen Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rp-date">Tarih:</label>
            <input type="date" id="hc-rp-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcRetroGezegenHesapla()">Retro Durumunu Kontrol Et</button>
        <div class="hc-result" id="hc-retro-planets-result">
            <div id="hc-rp-list" class="hc-rp-list">
                <!-- Retro listesi buraya -->
            </div>
            <p class="hc-rp-note">Not: Güneş ve Ay asla retro yapmaz.</p>
        </div>
    </div>
    <?php
}
