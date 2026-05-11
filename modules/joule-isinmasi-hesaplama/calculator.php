<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_joule_isinmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-joule-heat',
        HC_PLUGIN_URL . 'modules/joule-isinmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-joule-heat">
        <h3>Joule Isınması Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Akım (I, Amper)</label>
            <input type="number" id="hc-jh-i" placeholder="A" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Direnç (R, Ohm)</label>
            <input type="number" id="hc-jh-r" placeholder="Ω" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Süre (t, Saniye)</label>
            <input type="number" id="hc-jh-t" placeholder="Saniye" step="1" value="60">
        </div>
        
        <button class="hc-btn" onclick="hcJouleHeatHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-jh-result">
            <span>Açığa Çıkan Isı (Q):</span>
            <div class="hc-result-value" id="hc-jh-res-val">0 Joule</div>
            <div id="hc-jh-res-cal" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kalori</div>
        </div>
    </div>
    <?php
}
