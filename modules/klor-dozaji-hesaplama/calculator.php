<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klor_dozaji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chlorine-dose',
        HC_PLUGIN_URL . 'modules/klor-dozaji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-chlorine-dose">
        <h3>Klor Dozajı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Su Miktarı (m³)</label>
            <input type="number" id="hc-cd-vol" placeholder="m³" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Hedef Klor Konsantrasyonu (mg/L - ppm)</label>
            <input type="number" id="hc-cd-dose" placeholder="mg/L" step="0.1" value="2.0">
            <small>İçme Suyu: 0.5-2.0 mg/L, Havuz: 1.0-3.0 mg/L</small>
        </div>
        
        <div class="hc-form-group">
            <label>Klor Saflık / Çözelti Oranı (%)</label>
            <input type="number" id="hc-cd-purity" placeholder="%" step="1" value="100">
        </div>
        
        <button class="hc-btn" onclick="hcChlorineDoseHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cd-result">
            <span>Gereken Klor Miktarı:</span>
            <div class="hc-result-value" id="hc-cd-res-val">0 gram</div>
        </div>
    </div>
    <?php
}
