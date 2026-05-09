<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yolculuk_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trip-cost-calc',
        HC_PLUGIN_URL . 'modules/yolculuk-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ymh-box">
        <h3>Yakıt Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gidilecek Mesafe (km)</label>
            <input type="number" id="hc-ymh-dist" placeholder="Örn: 450">
        </div>
        <div class="hc-form-group">
            <label>Ortalama Yakıt Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-ymh-cons" value="6.5">
        </div>
        <div class="hc-form-group">
            <label>Yakıt Litre Fiyatı (TL)</label>
            <input type="number" step="0.01" id="hc-ymh-price" placeholder="Örn: 44.50">
        </div>
        <button class="hc-btn" onclick="hcYmhHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-ymh-result">
            <div class="hc-result-title">Tahmini Toplam Yakıt Gideri:</div>
            <div class="hc-result-value" id="hc-ymh-val">-</div>
            <div id="hc-ymh-per-person" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
