<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_ay_takvimi_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-month-zod',
        HC_PLUGIN_URL . 'modules/cin-ay-takvimi-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-month-calc">
        <h3>Çin Ay Takvimi Burcu (İçsel Hayvan)</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-cmb-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinAyBurcuHesapla()">İçsel Hayvanını Bul</button>
        <div class="hc-result" id="hc-cin-ay-takvimi-burcu-result">
            <div class="hc-result-header">İçsel Hayvanınız: <span id="hc-cmb-value" class="hc-result-value"></span></div>
            <div id="hc-cmb-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
