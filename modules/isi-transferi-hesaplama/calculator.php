<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_transferi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-trans',
        HC_PLUGIN_URL . 'modules/isi-transferi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-heat-trans">
        <h3>Isı İletim (Kondüksiyon) Hesaplama</h3>
        <p><small>Q = k × A × ΔT / d</small></p>
        
        <div class="hc-form-group">
            <label>Isıl İletkenlik (k, W/m·K)</label>
            <input type="number" id="hc-ht-k" placeholder="k" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-ht-a" placeholder="m²" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Farkı (ΔT, K)</label>
            <input type="number" id="hc-ht-dt" placeholder="K" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Malzeme Kalınlığı (d, metre)</label>
            <input type="number" id="hc-ht-d" placeholder="m" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcHeatTransHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ht-result">
            <span>Isı Akısı (Q):</span>
            <div class="hc-result-value" id="hc-ht-res-val">0 Watt</div>
        </div>
    </div>
    <?php
}
