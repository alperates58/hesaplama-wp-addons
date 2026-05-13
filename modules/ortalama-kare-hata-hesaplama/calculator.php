<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_kare_hata_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-kare-hata-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-kare-hata-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-kare-hata-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-kare-hata-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-kare-hata-hesaplama">
        <h3>Ortalama Kare Hata (MSE)</h3>
        <p>Gerçek ve tahmin edilen değerleri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mse-actual">Gerçek Değerler (Y)</label>
            <textarea id="hc-mse-actual" rows="3" placeholder="10, 15, 20, 25"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-mse-predicted">Tahmin Edilen Değerler (Ŷ)</label>
            <textarea id="hc-mse-predicted" rows="3" placeholder="11, 14, 21, 24"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ortalama-kare-hata-hesaplama-result">
            <span class="hc-label">MSE (Ortalama Kare Hata):</span>
            <div class="hc-result-value" id="hc-mse-res-value">0</div>
            <div id="hc-mse-res-rmse" style="margin-top:10px; color:#666;"></div>
        </div>
    </div>
    <?php
}
