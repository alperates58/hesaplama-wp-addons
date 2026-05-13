<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olasi_kombinasyon_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olasi-kombinasyon-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/olasi-kombinasyon-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olasi-kombinasyon-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/olasi-kombinasyon-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olasi-kombinasyon-sayisi-hesaplama">
        <h3>Kombinasyon Hesaplama C(n, r)</h3>
        <div class="hc-form-group">
            <label for="hc-comb-n">Toplam Eleman Sayısı (n)</label>
            <input type="number" id="hc-comb-n" min="0" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-comb-r">Seçilecek Eleman Sayısı (r)</label>
            <input type="number" id="hc-comb-r" min="0" placeholder="Örn: 3">
        </div>
        <button class="hc-btn" onclick="hcKombinasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olasi-kombinasyon-sayisi-hesaplama-result">
            <span class="hc-label">Kombinasyon Sayısı:</span>
            <div class="hc-result-value" id="hc-comb-res-val">0</div>
        </div>
    </div>
    <?php
}
