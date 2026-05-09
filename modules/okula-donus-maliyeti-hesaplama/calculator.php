<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_okula_donus_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-school-cost',
        HC_PLUGIN_URL . 'modules/okula-donus-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-school-cost-css',
        HC_PLUGIN_URL . 'modules/okula-donus-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-school-cost">
        <h3>Okula Dönüş Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-sc-stationery">Kırtasiye Paketi (TL)</label>
            <input type="number" id="hc-sc-stationery" value="1500">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-uniform">Okul Kıyafeti / Üniforma (TL)</label>
            <input type="number" id="hc-sc-uniform" value="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-shoes">Ayakkabı / Çanta (TL)</label>
            <input type="number" id="hc-sc-shoes" value="2500">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-books">Ek Kitaplar / Kaynaklar (TL)</label>
            <input type="number" id="hc-sc-books" value="1000">
        </div>
        <button class="hc-btn" onclick="hcSchoolCostHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-school-cost-result">
            <div class="hc-result-item">
                <span>Öğrenci Başı Maliyet:</span>
                <span class="hc-result-value" id="hc-res-sc-total">0 TL</span>
            </div>
            <p class="hc-sc-note">Fiyatlar 2026 eğitim yılı ortalama piyasa tahminleridir.</p>
        </div>
    </div>
    <?php
}
