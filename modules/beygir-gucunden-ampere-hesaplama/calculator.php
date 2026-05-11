<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beygir_gucunden_ampere_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hp-to-ampere',
        HC_PLUGIN_URL . 'modules/beygir-gucunden-ampere-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hp-to-ampere">
        <h3>Beygir Gücünden Ampere Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Motor Gücü (Beygir, HP)</label>
            <input type="number" id="hc-hpa-hp" placeholder="Örn: 5" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Gerilim (Volt, V)</label>
            <input type="number" id="hc-hpa-volt" value="220" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Faz Tipi</label>
            <select id="hc-hpa-faz" onchange="hcHpaFazDegistir()">
                <option value="1">Tek Faz (Single Phase)</option>
                <option value="3">Üç Faz (Three Phase)</option>
                <option value="dc">Doğru Akım (DC)</option>
            </select>
        </div>
        
        <div id="hc-hpa-ac-params">
            <div class="hc-form-group">
                <label>Güç Faktörü (Cos φ)</label>
                <input type="number" id="hc-hpa-pf" value="0.85" step="0.01">
            </div>
        </div>
        
        <div class="hc-form-group">
            <label>Motor Verimi (%)</label>
            <input type="number" id="hc-hpa-verim" value="90" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcHpAmpereHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hpa-result">
            <span>Tahmini Akım:</span>
            <div class="hc-result-value" id="hc-hpa-res-amp">0 Amper</div>
            <small id="hc-hpa-info">Not: 1 HP = 746 Watt</small>
        </div>
    </div>
    <?php
}
