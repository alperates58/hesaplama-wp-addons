<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-maliyeti-hesaplama">
        <h3>Çit Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cmal-len">Toplam Çit Uzunluğu (m)</label>
            <input type="number" id="hc-cmal-len" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmal-spacing">Direk Aralığı (m)</label>
            <input type="number" id="hc-cmal-spacing" value="2.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmal-post-price">Direk Birim Fiyatı (₺)</label>
            <input type="number" id="hc-cmal-post-price" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmal-panel-price">Panel / Tel m Fiyatı (₺)</label>
            <input type="number" id="hc-cmal-panel-price" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmal-labor">İşçilik m Fiyatı (₺)</label>
            <input type="number" id="hc-cmal-labor" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcCMALHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cmal-result">
            <div class="hc-result-label">Tahmini Toplam Maliyet:</div>
            <div class="hc-result-value" id="hc-cmal-val">-</div>
            <div class="hc-result-note">Nakliye ve küçük bağlantı elemanları hariçtir.</div>
        </div>
    </div>
    <?php
}
