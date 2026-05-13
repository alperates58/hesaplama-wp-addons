<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ondaliklari_kucukten_buyuge_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ondaliklari-kucukten-buyuge-siralama-hesaplama',
        HC_PLUGIN_URL . 'modules/ondaliklari-kucukten-buyuge-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ondaliklari-kucukten-buyuge-siralama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ondaliklari-kucukten-buyuge-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ondaliklari-kucukten-buyuge-siralama-hesaplama">
        <h3>Ondalık Sayı Sıralama (Küçükten Büyüğe)</h3>
        <p>Sayıları virgül, boşluk veya yeni satır ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-sort-data">Sayılar</label>
            <textarea id="hc-sort-data" rows="5" placeholder="10.5, 5.2, 12.8, 3.1, 7.9"></textarea>
        </div>
        <button class="hc-btn" onclick="hcOndalikSirala()">Sırala</button>
        <div class="hc-result" id="hc-ondaliklari-kucukten-buyuge-siralama-hesaplama-result">
            <span class="hc-label">Sıralanmış Liste:</span>
            <div id="hc-sort-res-list" class="hc-sort-list"></div>
        </div>
    </div>
    <?php
}
