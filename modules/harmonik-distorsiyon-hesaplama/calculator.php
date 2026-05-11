<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harmonik_distorsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thd-calc',
        HC_PLUGIN_URL . 'modules/harmonik-distorsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thd-calc">
        <h3>Toplam Harmonik Distorsiyon (THD)</h3>
        
        <div class="hc-form-group">
            <label>Temel Bileşen Genliği (V1)</label>
            <input type="number" id="hc-thd-v1" placeholder="Örn: 220" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>2. Harmonik (V2)</label>
            <input type="number" id="hc-thd-v2" placeholder="V" step="0.1" value="0">
        </div>
        
        <div class="hc-form-group">
            <label>3. Harmonik (V3)</label>
            <input type="number" id="hc-thd-v3" placeholder="V" step="0.1" value="0">
        </div>
        
        <div class="hc-form-group">
            <label>4. Harmonik (V4)</label>
            <input type="number" id="hc-thd-v4" placeholder="V" step="0.1" value="0">
        </div>
        
        <div class="hc-form-group">
            <label>5. Harmonik (V5)</label>
            <input type="number" id="hc-thd-v5" placeholder="V" step="0.1" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcThdHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-thd-result">
            <span>Toplam Harmonik Distorsiyon (THD):</span>
            <div class="hc-result-value" id="hc-thd-res-val">%0</div>
            <small>Formül: THD = √(ΣVn²) / V1 × 100</small>
        </div>
    </div>
    <?php
}
