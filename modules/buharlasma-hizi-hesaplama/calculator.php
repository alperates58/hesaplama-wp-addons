<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_buharlasma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evaporation',
        HC_PLUGIN_URL . 'modules/buharlasma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evaporation">
        <h3>Buharlaşma Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Su Sıcaklığı (°C)</label>
            <input type="number" id="hc-bh-temp" placeholder="Örn: 25" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Hava Nemi (%)</label>
            <input type="number" id="hc-bh-hum" placeholder="Örn: 50" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Rüzgar Hızı (m/s)</label>
            <input type="number" id="hc-bh-wind" placeholder="Örn: 2" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Su Yüzey Alanı (m²)</label>
            <input type="number" id="hc-bh-alan" placeholder="Örn: 50" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcBuharlasmaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bh-result">
            <span>Tahmini Buharlaşma Miktarı:</span>
            <div class="hc-result-value" id="hc-bh-res-kgh">0 kg/saat</div>
            <div id="hc-bh-res-lh" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Litre/saat</div>
        </div>
    </div>
    <?php
}
