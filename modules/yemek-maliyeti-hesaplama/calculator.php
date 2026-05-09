<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yemek-maliyet',
        HC_PLUGIN_URL . 'modules/yemek-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yemek-maliyet-css',
        HC_PLUGIN_URL . 'modules/yemek-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yemek-maliyet">
        <h3>Yemek Maliyeti Hesaplama</h3>
        <div id="hc-ingredients-container">
            <div class="hc-form-group hc-ingredient-row">
                <input type="text" placeholder="Malzeme Adı" class="hc-ing-name">
                <input type="number" placeholder="Miktar" class="hc-ing-qty" step="0.01">
                <input type="number" placeholder="Fiyat (TL)" class="hc-ing-price" step="0.01">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcYemekMalzemeEkle()">+ Malzeme Ekle</button>
        <div class="hc-form-group" style="margin-top: 15px;">
            <label for="hc-meal-portions">Toplam Porsiyon Sayısı</label>
            <input type="number" id="hc-meal-portions" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcYemekMaliyetHesapla()">Maliyet Hesapla</button>
        <div class="hc-result" id="hc-yemek-maliyet-result">
            <div class="hc-result-item">
                <span>Toplam Maliyet:</span>
                <span class="hc-result-value" id="hc-res-meal-total">0 TL</span>
            </div>
            <div class="hc-result-item">
                <span>Porsiyon Başına:</span>
                <span id="hc-res-meal-per-portion">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
