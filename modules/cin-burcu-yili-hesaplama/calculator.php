<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_yili_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-burcu-yili',
        HC_PLUGIN_URL . 'modules/cin-burcu-yili-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-burcu-yili-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-yili-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-burcu-yili">
        <h3>Çin Burcu Yılı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cby-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-cby-birthdate" class="hc-input" required>
            <small>Not: Çin yeni yılı Ocak veya Şubat aylarında değiştiği için tam gününüz önemlidir.</small>
        </div>
        <button class="hc-btn" onclick="hcCinBurcuYiliHesapla()">Burcunu Bul</button>
        <div class="hc-result" id="hc-cin-burcu-yili-result">
            <div class="hc-result-header">Çin Burcunuz: <span id="hc-cby-name" class="hc-result-value"></span></div>
            <div id="hc-cby-details" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
