<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dc_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dc-cable',
        HC_PLUGIN_URL . 'modules/dc-kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dc-cable">
        <h3>DC Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Sistem Gerilimi (V)</label>
            <input type="number" id="hc-dcc-volt" value="12" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kablo Uzunluğu (Tek Yönlü, metre)</label>
            <input type="number" id="hc-dcc-l" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Akım (Amper, A)</label>
            <input type="number" id="hc-dcc-i" placeholder="A" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kabul Edilebilir Gerilim Düşümü (%)</label>
            <input type="number" id="hc-dcc-dv" value="3" step="0.1">
            <small>Genellikle 1% - 3% önerilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcDcCableHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dcc-result">
            <span>Önerilen Minimum Kesit:</span>
            <div class="hc-result-value" id="hc-dcc-res-s">0 mm²</div>
            <div id="hc-dcc-res-dv-val" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Gerilim Düşümü: 0 V</div>
        </div>
    </div>
    <?php
}
