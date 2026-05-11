<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konserve_proses_yeterliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-canning-f0',
        HC_PLUGIN_URL . 'modules/konserve-proses-yeterliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-canning-f0">
        <h3>Konserve Sterilizasyon Değeri (F₀)</h3>
        <p><small>F₀ = t × 10^((T - 121.1) / z)</small></p>
        
        <div class="hc-form-group">
            <label>Isıl İşlem Sıcaklığı (T, °C)</label>
            <input type="number" id="hc-f0-t" placeholder="°C" step="0.1" value="121.1">
        </div>
        
        <div class="hc-form-group">
            <label>İşlem Süresi (t, dakika)</label>
            <input type="number" id="hc-f0-time" placeholder="dk" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>z-Değeri (°C)</label>
            <input type="number" id="hc-f0-z" placeholder="°C" step="0.1" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcCanningF0Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-f0-result">
            <span>Sterilizasyon Değeri (F₀):</span>
            <div class="hc-result-value" id="hc-f0-res-val">0 dk</div>
            <div id="hc-f0-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
