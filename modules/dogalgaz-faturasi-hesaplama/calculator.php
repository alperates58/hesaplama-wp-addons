<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_faturasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogalgaz-faturasi-hesaplama',
        HC_PLUGIN_URL . 'modules/dogalgaz-faturasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogalgaz-faturasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-faturasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gas-bill">
        <h3>Doğalgaz Faturası Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-gb-m3">Kullanılan Miktar (m³)</label>
            <input type="number" id="hc-gb-m3" placeholder="Örn: 150">
        </div>
        <button class="hc-btn" onclick="hcDoğalgazFaturasıHesapla()">Faturayı Hesapla</button>
        <div class="hc-result" id="hc-gb-result">
            <div class="hc-result-label">Tahmini Fatura Tutarı:</div>
            <div class="hc-result-value" id="hc-gb-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*2026 Nisan tarifesi (12.50 TL/m³) ve vergiler dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
