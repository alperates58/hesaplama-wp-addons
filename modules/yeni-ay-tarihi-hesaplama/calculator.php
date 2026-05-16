<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yeni_ay_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yeni-ay-tarihi-hesaplama',
        HC_PLUGIN_URL . 'modules/yeni-ay-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yeni-ay-tarihi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yeni-ay-tarihi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-new-moon">
        <h3>Yeni Ay Tarihi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nm-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-nm-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcNewMoonDateHesapla()">Sıradaki Yeni Ayı Bul</button>
        <div class="hc-result" id="hc-new-moon-result">
            <div class="hc-nm-value" id="hc-nm-val">-</div>
            <div id="hc-nm-desc" class="hc-nm-desc"></div>
        </div>
    </div>
    <?php
}
