<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_yemek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meal-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-yemek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meal-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-yemek-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-meal-per-person">
        <h3>Genel Yemek Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-mpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mpp-intensity">Öğün Tipi</label>
            <select id="hc-mpp-intensity">
                <option value="600">Standart Ev Yemeği (600g / Kişi)</option>
                <option value="800">Doyurucu Akşam Yemeği (800g / Kişi)</option>
                <option value="400">Hafif Öğle Yemeği (400g / Kişi)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcGenelYemekHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-meal-per-person-result">
            <div class="hc-result-item">
                <span>Toplam Gıda Ağırlığı:</span>
                <strong class="hc-result-value" id="hc-mpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Bu hesaplama; ana yemek, garnitür ve yardımcı ürünlerin toplam ağırlığını temsil eder.</div>
        </div>
    </div>
    <?php
}
