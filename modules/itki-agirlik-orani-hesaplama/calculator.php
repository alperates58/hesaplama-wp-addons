<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_itki_agirlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thrust-weight',
        HC_PLUGIN_URL . 'modules/itki-agirlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thrust-weight">
        <h3>İtki Ağırlık Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam İtki (N - Newton)</label>
            <input type="number" id="hc-tw-thrust" placeholder="Örn: 1000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Kütle (kg)</label>
            <input type="number" id="hc-tw-mass" placeholder="Örn: 80" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcThrustWeightHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tw-result">
            <span>İtki-Ağırlık Oranı (T/W):</span>
            <div class="hc-result-value" id="hc-tw-res-val">0</div>
            <div id="hc-tw-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
