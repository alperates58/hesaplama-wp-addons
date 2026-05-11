<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diyaliz_yeterliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dialysis-ktv',
        HC_PLUGIN_URL . 'modules/diyaliz-yeterliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dialysis-ktv">
        <h3>Diyaliz Yeterliliği (Kt/V) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Diyaliz Öncesi BUN (mg/dL)</label>
            <input type="number" id="hc-dy-pre" placeholder="Örn: 80" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Diyaliz Sonrası BUN (mg/dL)</label>
            <input type="number" id="hc-dy-post" placeholder="Örn: 25" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Diyaliz Süresi (Saat)</label>
            <input type="number" id="hc-dy-time" placeholder="Örn: 4" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Çekilen Sıvı / Kilo Kaybı (kg)</label>
            <input type="number" id="hc-dy-uf" placeholder="Örn: 2.5" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Diyaliz Sonrası Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-dy-weight" placeholder="Örn: 70" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcDiyalizKtVHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dy-result">
            <span>Kt/V Değeri:</span>
            <div class="hc-result-value" id="hc-dy-res-val">0</div>
            <div id="hc-dy-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
