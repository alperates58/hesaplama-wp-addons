<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cv_debi_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cv-kv',
        HC_PLUGIN_URL . 'modules/cv-debi-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cv-kv">
        <h3>Cv / Kv Debi Katsayısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Debi (Q, m³/saat)</label>
            <input type="number" id="hc-cv-q" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Basınç Farkı (ΔP, bar)</label>
            <input type="number" id="hc-cv-dp" placeholder="Örn: 1" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Ağırlık (SG, Su = 1)</label>
            <input type="number" id="hc-cv-sg" value="1" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcCvKvHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cv-result">
            <div style="display: flex; justify-content: space-around; text-align: center;">
                <div>
                    <span>Kv Katsayısı (SI):</span>
                    <div class="hc-result-value" id="hc-cv-res-kv">0</div>
                    <small>m³/h @ 1 bar</small>
                </div>
                <div>
                    <span>Cv Katsayısı (ABD):</span>
                    <div class="hc-result-value" id="hc-cv-res-cv">0</div>
                    <small>GPM @ 1 PSI</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
