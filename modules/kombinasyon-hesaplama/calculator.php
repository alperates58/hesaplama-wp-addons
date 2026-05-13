<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kombinasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kombinasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/kombinasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kombinasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kombinasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kombinasyon">
        <h3>Kombinasyon Hesaplama C(n, r)</h3>
        <div class="hc-form-group">
            <label for="hc-comb-n">Toplam Eleman Sayısı (n):</label>
            <input type="number" id="hc-comb-n" class="hc-input" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-comb-r">Seçilecek Eleman Sayısı (r):</label>
            <input type="number" id="hc-comb-r" class="hc-input" placeholder="Örn: 3">
        </div>
        <button class="hc-btn" onclick="hcKombinasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kombinasyon-result">
            <div class="hc-result-label">Kombinasyon Sayısı C(n, r):</div>
            <div class="hc-result-value" id="hc-res-comb-val">-</div>
            <p id="hc-comb-formula" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
