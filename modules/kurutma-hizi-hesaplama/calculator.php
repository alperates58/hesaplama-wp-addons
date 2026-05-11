<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kurutma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dry-rate',
        HC_PLUGIN_URL . 'modules/kurutma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dry-rate">
        <h3>Kurutma Hızı Hesaplama</h3>
        <p><small>R = (W₁ - W₂) / (A × t)</small></p>
        
        <div class="hc-form-group">
            <label>Başlangıç Ağırlığı (W1, kg)</label>
            <input type="number" id="hc-dr-w1" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Son Ağırlık (W2, kg)</label>
            <input type="number" id="hc-dr-w2" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kurutma Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-dr-a" placeholder="m²" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Süre (t, saat)</label>
            <input type="number" id="hc-dr-t" placeholder="h" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcDryRateHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dr-result">
            <span>Kurutma Hızı (R):</span>
            <div class="hc-result-value" id="hc-dr-res-val">0 kg/m²h</div>
        </div>
    </div>
    <?php
}
