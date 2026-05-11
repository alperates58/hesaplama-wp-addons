<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_gaz_sicakligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-t',
        HC_PLUGIN_URL . 'modules/ideal-gaz-sicakligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-t">
        <h3>İdeal Gaz Sıcaklığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Basınç (P, bar)</label>
            <input type="number" id="hc-it-p" placeholder="bar" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Hacim (V, Litre)</label>
            <input type="number" id="hc-it-v" placeholder="Litre" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Madde Miktarı (n, mol)</label>
            <input type="number" id="hc-it-n" placeholder="mol" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcIdealTHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-it-result">
            <span>Hesaplanan Sıcaklık (T):</span>
            <div class="hc-result-value" id="hc-it-res-val">0 °C</div>
            <div id="hc-it-res-k" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Kelvin (K)</div>
        </div>
    </div>
    <?php
}
