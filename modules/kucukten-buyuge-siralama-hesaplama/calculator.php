<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kucukten_buyuge_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kucukten-buyuge-siralama-hesaplama',
        HC_PLUGIN_URL . 'modules/kucukten-buyuge-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kucukten-buyuge-siralama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kucukten-buyuge-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kucukten-buyuge">
        <h3>Küçükten Büyüğe Sıralama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sort-input">Sayılar (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-sort-input" class="hc-input" placeholder="Örn: 23, 5, 12, 8, 45"></textarea>
        </div>
        <button class="hc-btn" onclick="hcSiralamaHesapla()">Sırala</button>
        <div class="hc-result" id="hc-kucukten-buyuge-result">
            <div class="hc-result-label">Sıralanmış Liste:</div>
            <div id="hc-sorted-list" style="word-break: break-all; margin-bottom: 15px; font-weight: bold; color: #2c3e50;">-</div>
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Adet:</span>
                    <strong id="hc-res-sort-count">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Toplam:</span>
                    <strong id="hc-res-sort-sum">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
