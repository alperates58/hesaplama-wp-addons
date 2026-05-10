<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kozmetik_urun_kullanim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kozmetik-urun-kullanim-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/kozmetik-urun-kullanim-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kozmetik-urun-kullanim-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kozmetik-urun-kullanim-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cosmetic">
        <h3>Kozmetik Ürün Kullanım Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-cos-price">Ürün Fiyatı (₺)</label>
            <input type="number" id="hc-cos-price" placeholder="Örn: 450" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-cos-size">Miktar (ml veya gr)</label>
            <input type="number" id="hc-cos-size" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-cos-usage">Bir Kullanımda Tahmini Miktar (ml/gr)</label>
            <input type="number" id="hc-cos-usage" placeholder="Örn: 1" step="0.1">
            <small>Örn: Bir pompa krem genelde 0.5-1ml arasıdır.</small>
        </div>
        <button class="hc-btn" onclick="hcKozmetikÜrünKullanımMaliyetiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cos-result">
            <div class="hc-result-label">Bir Kullanım Maliyeti:</div>
            <div class="hc-result-value" id="hc-cos-val">-</div>
            <div id="hc-cos-stats" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
