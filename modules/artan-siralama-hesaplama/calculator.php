<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_artan_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-artan-siralama-hesaplama',
        HC_PLUGIN_URL . 'modules/artan-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-artan-siralama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/artan-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asc-sort">
        <h3>Artan Sıralama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-asc-data">Sayıları Girin (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-asc-data" class="hc-input" placeholder="Örn: 50, 10, 85, 23, 12"></textarea>
        </div>
        <button class="hc-btn" onclick="hcAscSortHesapla()">Sırala</button>
        <div class="hc-result" id="hc-artan-siralama-hesaplama-result">
            <div class="hc-result-label">Sıralanmış Liste (Küçükten Büyüğe):</div>
            <div id="hc-res-asc-list" class="hc-sorted-box"></div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Toplam Eleman Sayısı: <span id="hc-res-asc-count">0</span></p>
        </div>
    </div>
    <?php
}
