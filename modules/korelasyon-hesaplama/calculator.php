<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_korelasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-korelasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/korelasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-korelasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/korelasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-korelasyon">
        <h3>Korelasyon (Pearson r) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-corr-x">X Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-corr-x" class="hc-input" placeholder="Örn: 1, 2, 3, 4, 5"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-corr-y">Y Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-corr-y" class="hc-input" placeholder="Örn: 2, 4, 5, 4, 5"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKorelasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-korelasyon-result">
            <div class="hc-result-label">Pearson Korelasyon Katsayısı (r):</div>
            <div class="hc-result-value" id="hc-res-corr-r">-</div>
            <div style="margin-top: 15px;">
                <span>Belirlilik Katsayısı (r²):</span>
                <strong id="hc-res-corr-r2">-</strong>
            </div>
            <p id="hc-corr-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
