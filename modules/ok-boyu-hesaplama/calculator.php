<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ok_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arrow-len',
        HC_PLUGIN_URL . 'modules/ok-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arrow-len-css',
        HC_PLUGIN_URL . 'modules/ok-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arrow-len">
        <h3>Ok Boyu & Çekiş Mesafesi Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-al-span">Kol Açıklığı (cm):</label>
            <input type="number" id="hc-al-span" placeholder="180">
            <small>Kollarınızı iki yana tam açtığınızda parmak uçları arası mesafe.</small>
        </div>
        <button class="hc-btn" onclick="hcArrowLenHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-arrow-len-result">
            <strong>Önerilen Ok Boyu:</strong>
            <div id="hc-al-res-val" class="hc-result-value">-</div>
            <span>Santimetre (cm)</span>
        </div>
    </div>
    <?php
}
