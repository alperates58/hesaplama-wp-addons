<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cable-size',
        HC_PLUGIN_URL . 'modules/kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cable-size">
        <h3>Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Güç (P, Watt)</label>
            <input type="number" id="hc-cs-p" placeholder="W" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Hat Uzunluğu (L, metre)</label>
            <input type="number" id="hc-cs-l" placeholder="m" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Şebeke Gerilimi (V, Volt)</label>
            <select id="hc-cs-v">
                <option value="220" selected>220V (Monofaze)</option>
                <option value="380">380V (Trifaze)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>İzin Verilen Gerilim Düşümü (%e)</label>
            <input type="number" id="hc-cs-e" placeholder="%" step="0.1" value="1.5">
        </div>
        
        <button class="hc-btn" onclick="hcCableSizeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cs-result">
            <span>Minimum Gerekli Kesit (S):</span>
            <div class="hc-result-value" id="hc-cs-res-val">0 mm²</div>
            <div id="hc-cs-res-std" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Önerilen Standart Kesit: -</div>
        </div>
    </div>
    <?php
}
