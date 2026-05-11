<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lineer_aktuator_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-actuator',
        HC_PLUGIN_URL . 'modules/lineer-aktuator-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-actuator">
        <h3>Lineer Aktüatör Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Giriş Torku (Nm)</label>
            <input type="number" id="hc-la-torque" placeholder="Nm" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Vida Adımı (Pitch, mm)</label>
            <input type="number" id="hc-la-pitch" placeholder="mm" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Mekanik Verimlilik (%)</label>
            <input type="number" id="hc-la-eff" placeholder="Örn: 80" step="1" value="80">
        </div>
        
        <button class="hc-btn" onclick="hcActuatorHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-la-result">
            <span>Üretilen Lineer Kuvvet:</span>
            <div class="hc-result-value" id="hc-la-res-val">0 N</div>
            <div id="hc-la-res-kg" style="margin-top:5px; font-size:0.9em; opacity:0.8;">~0 kgf</div>
        </div>
    </div>
    <?php
}
