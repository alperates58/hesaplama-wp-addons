<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayilari_kucukten_buyuge_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sort-asc',
        HC_PLUGIN_URL . 'modules/sayilari-kucukten-buyuge-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sort-asc-css',
        HC_PLUGIN_URL . 'modules/sayilari-kucukten-buyuge-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sort-asc">
        <h3>Sayı Sıralama Aracı</h3>
        <div class="hc-form-group">
            <label for="hc-sa-data">Sayılar (Virgül, boşluk veya yeni satır ile ayırın)</label>
            <textarea id="hc-sa-data" placeholder="Örn: 45, 12, 89, 23"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-sa-order">Sıralama Yönü</label>
            <select id="hc-sa-order">
                <option value="asc">Küçükten Büyüğe</option>
                <option value="desc">Büyükten Küçüğe</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSortAscHesapla()">Sırala</button>
        <div class="hc-result" id="hc-sort-asc-result">
            <div class="hc-result-item">
                <span>Sıralanmış Liste:</span>
                <textarea id="hc-res-sa-val" readonly style="margin-top:10px; height:100px;"></textarea>
            </div>
            <div class="hc-sa-stats">
                Adet: <b id="hc-res-sa-count">0</b>
            </div>
        </div>
    </div>
    <?php
}
