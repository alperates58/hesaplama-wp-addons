<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dolunay_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dolunay-tarihi-hesaplama',
        HC_PLUGIN_URL . 'modules/dolunay-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dolunay-tarihi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dolunay-tarihi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-full-moon">
        <h3>Dolunay Tarihi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fm-date">Başlangıç Tarihi:</label>
            <input type="date" id="hc-fm-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcFullMoonDateHesapla()">Sıradaki Dolunayı Bul</button>
        <div class="hc-result" id="hc-full-moon-result">
            <div class="hc-fm-value" id="hc-fm-val">-</div>
            <div id="hc-fm-desc" class="hc-fm-desc"></div>
        </div>
    </div>
    <?php
}
