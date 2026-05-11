<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_brix_seker_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brix',
        HC_PLUGIN_URL . 'modules/brix-seker-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-brix">
        <h3>Brix Şeker Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Şeker Miktarı (gram)</label>
            <input type="number" id="hc-br-seker" placeholder="Örn: 20" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Su/Sıvı Miktarı (gram)</label>
            <input type="number" id="hc-br-su" placeholder="Örn: 80" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBrixHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-br-result">
            <span>Brix Değeri:</span>
            <div class="hc-result-value" id="hc-br-res-val">0 °Bx</div>
            <div id="hc-br-res-sg" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Özgül Ağırlık (SG): 1.000</div>
        </div>
    </div>
    <?php
}
