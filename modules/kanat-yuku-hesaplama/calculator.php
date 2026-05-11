<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kanat_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wing-loading',
        HC_PLUGIN_URL . 'modules/kanat-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-wing-loading">
        <h3>Kanat Yükü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Kütle (kg)</label>
            <input type="number" id="hc-wl-mass" placeholder="Örn: 1500" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Kanat Alanı (m²)</label>
            <input type="number" id="hc-wl-area" placeholder="Örn: 15" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcWingLoadingHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-wl-result">
            <span>Kanat Yüklemesi:</span>
            <div class="hc-result-value" id="hc-wl-res-val">0 kg/m²</div>
            <div id="hc-wl-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
