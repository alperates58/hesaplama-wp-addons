<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_tasinim_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-conv-coeff',
        HC_PLUGIN_URL . 'modules/isi-tasinim-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-conv-coeff">
        <h3>Isı Taşınım Katsayısı (h) Hesaplama</h3>
        <p><small>h = Q / (A × ΔT)</small></p>
        
        <div class="hc-form-group">
            <label>Aktarılan Isı (Q, Watt)</label>
            <input type="number" id="hc-cc-q" placeholder="W" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-cc-a" placeholder="m²" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Farkı (ΔT, K)</label>
            <input type="number" id="hc-cc-dt" placeholder="K" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcConvCoeffHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cc-result">
            <span>Taşınım Katsayısı (h):</span>
            <div class="hc-result-value" id="hc-cc-res-val">0 W/m²·K</div>
        </div>
    </div>
    <?php
}
