<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geri_donusum_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-recycling-rate',
        HC_PLUGIN_URL . 'modules/geri-donusum-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-recycling-rate">
        <h3>Geri Dönüşüm Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Geri Dönüştürülen Atık (kg)</label>
            <input type="number" id="hc-gr-recycled" placeholder="Örn: 450" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Bertaraf Edilen (Çöp) Atık (kg)</label>
            <input type="number" id="hc-gr-disposed" placeholder="Örn: 550" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcRecyclingRateHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gr-result">
            <span>Toplam Geri Dönüşüm Oranı:</span>
            <div class="hc-result-value" id="hc-gr-res-val">%0</div>
            <div id="hc-gr-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Toplam Atık: 0 kg</div>
        </div>
    </div>
    <?php
}
