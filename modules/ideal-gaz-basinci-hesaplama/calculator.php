<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_gaz_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-p',
        HC_PLUGIN_URL . 'modules/ideal-gaz-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-p">
        <h3>İdeal Gaz Basıncı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Madde Miktarı (n, mol)</label>
            <input type="number" id="hc-ip-n" placeholder="mol" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Hacim (V, Litre)</label>
            <input type="number" id="hc-ip-v" placeholder="Litre" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık (T, °C)</label>
            <input type="number" id="hc-ip-t" placeholder="°C" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcIdealPHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ip-result">
            <span>Hesaplanan Basınç (P):</span>
            <div class="hc-result-value" id="hc-ip-res-val">0 bar</div>
            <div id="hc-ip-res-pa" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Pascal (Pa)</div>
        </div>
    </div>
    <?php
}
