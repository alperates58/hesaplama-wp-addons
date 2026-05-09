<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sezonluk_endeks_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seasonal-index',
        HC_PLUGIN_URL . 'modules/sezonluk-endeks-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seasonal-index-css',
        HC_PLUGIN_URL . 'modules/sezonluk-endeks-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seasonal-index">
        <h3>Sezonluk Endeks Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-si-data">Dönem Verileri (Virgül ile, örn: 1.Yıl Çeyrekleri)</label>
            <textarea id="hc-si-data" placeholder="Örn: 100, 150, 80, 200"></textarea>
        </div>
        <button class="hc-btn" onclick="hcSeasonalIndexHesapla()">Endeksleri Hesapla</button>
        <div class="hc-result" id="hc-seasonal-index-result">
            <div id="hc-si-list" class="hc-si-list"></div>
            <p class="hc-si-note">Not: 100 üzerindeki değerler sezonluk artışı, altındakiler azalışı temsil eder.</p>
        </div>
    </div>
    <?php
}
