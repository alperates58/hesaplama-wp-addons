<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_buyukten_kucuge_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-buyukten-kucuge-siralama-hesaplama',
        HC_PLUGIN_URL . 'modules/buyukten-kucuge-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-buyukten-kucuge-siralama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/buyukten-kucuge-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-desc-sort">
        <h3>Büyükten Küçüğe Sıralama</h3>
        <div class="hc-form-group">
            <label for="hc-sort-data">Sayıları Girin (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-sort-data" class="hc-input" placeholder="Örn: 23, 5, 89, 12, 45"></textarea>
        </div>
        <button class="hc-btn" onclick="hcDescSortHesapla()">Sırala</button>
        <div class="hc-result" id="hc-buyukten-kucuge-siralama-hesaplama-result">
            <div class="hc-result-label">Sıralanmış Liste:</div>
            <div id="hc-res-sorted-list" class="hc-sorted-box"></div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Toplam Eleman Sayısı: <span id="hc-res-sort-count">0</span></p>
        </div>
    </div>
    <?php
}
