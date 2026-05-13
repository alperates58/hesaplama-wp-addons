<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlikli_hareketli_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agirlikli-hareketli-ortalama-hesaplama',
        HC_PLUGIN_URL . 'modules/agirlikli-hareketli-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agirlikli-hareketli-ortalama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/agirlikli-hareketli-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wma-calc">
        <h3>Ağırlıklı Hareketli Ortalama (WMA) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wma-data">Veri Serisi (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-wma-data" class="hc-input" placeholder="Örn: 10, 12, 15, 14, 18, 20"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-wma-period">Periyot (n):</label>
            <input type="number" id="hc-wma-period" class="hc-input" value="3" min="2">
        </div>
        <button class="hc-btn" onclick="hcWMAHesapla()">WMA Hesapla</button>
        <div class="hc-result" id="hc-agirlikli-hareketli-ortalama-hesaplama-result">
            <div class="hc-result-label">Son Periyot WMA Değeri:</div>
            <div class="hc-result-value" id="hc-res-wma-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Not: Ağırlıklar lineer (1, 2, ..., n) olarak atanmıştır (en yeni veriye en yüksek ağırlık).</p>
        </div>
    </div>
    <?php
}
