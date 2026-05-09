<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aylik_elektrik_faturasi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bill-estimate',
        HC_PLUGIN_URL . 'modules/aylik-elektrik-faturasi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bill-estimate-css',
        HC_PLUGIN_URL . 'modules/aylik-elektrik-faturasi-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bill-estimate">
        <h3>Aylık Elektrik Faturası Tahmini</h3>
        
        <div class="hc-form-group">
            <label for="hc-be-daily">Günlük Ortalama Tüketim (kWh)</label>
            <input type="number" id="hc-be-daily" placeholder="Örn: 10" step="0.1">
            <small>Faturanızdaki toplam kWh / gün sayısı şeklinde hesaplayabilirsiniz.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-be-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-be-price" value="3.11" step="0.01">
            <small>2026 ortalama mesken tarifesi baz alınmıştır.</small>
        </div>

        <button class="hc-btn" onclick="hcFaturaTahminiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-result-item">
                <span>Tahmini Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-be-usage">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Fatura Tutarı:</span>
                <span class="hc-result-value highlight" id="hc-res-be-total">-</span>
            </div>
            <div class="hc-result-note">
                * KDV ve diğer yasal vergiler dahil edilmiştir. Kademeli tarife (4.000 kWh/yıl sınırı) sonuçları etkileyebilir.
            </div>
        </div>
    </div>
    <?php
}
