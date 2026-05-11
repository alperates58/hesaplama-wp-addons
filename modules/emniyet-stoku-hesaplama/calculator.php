<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emniyet_stoku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-safety-stock',
        HC_PLUGIN_URL . 'modules/emniyet-stoku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-safety-stock">
        <h3>Emniyet Stoku Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Günlük Talebin Standart Sapması (Adet)</label>
            <input type="number" id="hc-ss-sigma" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Tedarik Süresi (Lead Time, Gün)</label>
            <input type="number" id="hc-ss-lt" placeholder="Örn: 5" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>İstenen Servis Seviyesi (%)</label>
            <select id="hc-ss-service">
                <option value="1.28">90% (Z=1.28)</option>
                <option value="1.65" selected>95% (Z=1.65)</option>
                <option value="1.96">97.5% (Z=1.96)</option>
                <option value="2.33">99% (Z=2.33)</option>
                <option value="3.09">99.9% (Z=3.09)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcSafetyStockHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ss-result">
            <span>Gerekli Emniyet Stoku:</span>
            <div class="hc-result-value" id="hc-ss-res-val">0 Adet</div>
            <small>Formül: Z × σ × √L</small>
        </div>
    </div>
    <?php
}
