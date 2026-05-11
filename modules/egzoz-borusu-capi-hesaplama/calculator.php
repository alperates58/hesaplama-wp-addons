<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egzoz_borusu_capi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exhaust-pipe',
        HC_PLUGIN_URL . 'modules/egzoz-borusu-capi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-exhaust-pipe">
        <h3>Egzoz Borusu Çapı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Egzoz Gazı Debisi (Q, m³/saat)</label>
            <input type="number" id="hc-eb-q" placeholder="Örn: 500" step="1">
            <small>Motor gücü (kW) x 2.5 ~ 3.5 (yaklaşık debi).</small>
        </div>
        
        <div class="hc-form-group">
            <label>İzin Verilen Maksimum Hız (v, m/s)</label>
            <input type="number" id="hc-eb-v" value="50" step="1">
            <small>Jeneratörler için 40-50, Araçlar için 60-90 m/s önerilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcEgzozBorusuHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-eb-result">
            <span>Önerilen İç Çap (D):</span>
            <div class="hc-result-value" id="hc-eb-res-mm">0 mm</div>
            <div id="hc-eb-res-inch" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 inch (yaklaşık)</div>
        </div>
    </div>
    <?php
}
