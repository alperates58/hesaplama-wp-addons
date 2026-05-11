<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duyulur_isi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sensible-heat',
        HC_PLUGIN_URL . 'modules/duyulur-isi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sensible-heat">
        <h3>Duyulur Isı (Sensible Heat) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Madde Kütlesi (m, kg)</label>
            <input type="number" id="hc-sh-m" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Isı Kapasitesi (c, J/kg°C)</label>
            <input type="number" id="hc-sh-c" placeholder="Örn: 4186 (Su)" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Farkı (ΔT, °C)</label>
            <input type="number" id="hc-sh-dt" placeholder="Örn: 50" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcSensibleHeatHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sh-result">
            <span>Gereken Isı Enerjisi (Q):</span>
            <div class="hc-result-value" id="hc-sh-res-kj">0 kJ</div>
            <div id="hc-sh-res-kcal" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kcal</div>
            <div id="hc-sh-res-j" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Joule</div>
        </div>
    </div>
    <?php
}
