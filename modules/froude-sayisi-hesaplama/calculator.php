<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_froude_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-froude-calc',
        HC_PLUGIN_URL . 'modules/froude-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-froude-calc">
        <h3>Froude Sayısı (Fr) Hesaplama</h3>
        <p><small>Fr = v / √(g × L)</small></p>
        
        <div class="hc-form-group">
            <label>Akış Hızı (v, m/s)</label>
            <input type="number" id="hc-fr-v" placeholder="m/s" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Karakteristik Uzunluk (L, metre)</label>
            <input type="number" id="hc-fr-l" placeholder="m" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcFroudeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fr-result">
            <span>Froude Sayısı (Fr):</span>
            <div class="hc-result-value" id="hc-fr-res-val">0</div>
            <div id="hc-fr-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
