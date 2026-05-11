<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_kara_gore_satis_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hedef-kara-gore-satis-hesaplama',
        HC_PLUGIN_URL . 'modules/hedef-kara-gore-satis-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hedef-kara-gore-satis-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hedef-kara-gore-satis-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hedef-kara-gore-satis">
        <h3>Hedef Kara Göre Satış Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hks-target">Hedeflenen Net Kâr (₺)</label>
            <input type="number" id="hc-hks-target" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-hks-fixed">Toplam Sabit Maliyetler (₺)</label>
            <input type="number" id="hc-hks-fixed" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-hks-price">Birim Satış Fiyatı (₺)</label>
            <input type="number" id="hc-hks-price" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-hks-variable">Birim Değişken Maliyet (₺)</label>
            <input type="number" id="hc-hks-variable" placeholder="Örn: 200">
        </div>
        <button class="hc-btn" onclick="hcHedefKaraGoreSatisHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hks-result">
            <div class="hc-result-item">
                <span>Gereken Satış Miktarı (Birim):</span>
                <strong class="hc-result-value" id="hc-hks-units">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ulaşılması Gereken Ciro:</span>
                <strong id="hc-hks-revenue">-</strong>
            </div>
        </div>
    </div>
    <?php
}
