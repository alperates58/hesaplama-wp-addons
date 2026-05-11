<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_gaz_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-v',
        HC_PLUGIN_URL . 'modules/ideal-gaz-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-v">
        <h3>İdeal Gaz Hacmi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Madde Miktarı (n, mol)</label>
            <input type="number" id="hc-iv-n" placeholder="mol" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Basınç (P, bar)</label>
            <input type="number" id="hc-iv-p" placeholder="bar" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık (T, °C)</label>
            <input type="number" id="hc-iv-t" placeholder="°C" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcIdealVHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-iv-result">
            <span>Hesaplanan Hacim (V):</span>
            <div class="hc-result-value" id="hc-iv-res-val">0 Litre</div>
            <div id="hc-iv-res-m3" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 m³</div>
        </div>
    </div>
    <?php
}
