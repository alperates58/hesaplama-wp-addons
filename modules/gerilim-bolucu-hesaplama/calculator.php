<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilim_bolucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-v-divider',
        HC_PLUGIN_URL . 'modules/gerilim-bolucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-v-divider">
        <h3>Gerilim Bölücü Hesaplama</h3>
        <p><small>Vout = Vin × R2 / (R1 + R2)</small></p>
        
        <div class="hc-form-group">
            <label>Giriş Gerilimi (Vin, Volt)</label>
            <input type="number" id="hc-vd-vin" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Direnç 1 (R1, Ω)</label>
            <input type="number" id="hc-vd-r1" placeholder="Ω" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Direnç 2 (R2, Ω)</label>
            <input type="number" id="hc-vd-r2" placeholder="Ω" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcVDividerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-vd-result">
            <span>Çıkış Gerilimi (Vout):</span>
            <div class="hc-result-value" id="hc-vd-res-val">0 V</div>
            <div id="hc-vd-res-current" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Hat Akımı: 0 mA</div>
        </div>
    </div>
    <?php
}
