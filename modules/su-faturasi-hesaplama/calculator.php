<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_faturasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-bill',
        HC_PLUGIN_URL . 'modules/su-faturasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-bill-css',
        HC_PLUGIN_URL . 'modules/su-faturasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-bill">
        <h3>Su Faturası Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-water-usage">Tüketim Miktarı (m³)</label>
            <input type="number" id="hc-water-usage" placeholder="Örn: 10" step="0.1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-water-city">Bölge / Birim Fiyat (m³ başına TL)</label>
            <input type="number" id="hc-water-price" value="25.00" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcWaterBillHesapla()">Faturayı Hesapla</button>
        <div class="hc-result" id="hc-water-bill-result">
            <div class="hc-result-item">
                <span>Ödenecek Tutar:</span>
                <span class="hc-result-value" id="hc-res-water-total">0 TL</span>
            </div>
            <p class="hc-water-note">Atık su, KDV ve çevre temizlik vergisi dahil tahmini tutardır.</p>
        </div>
    </div>
    <?php
}
