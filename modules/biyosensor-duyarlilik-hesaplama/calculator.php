<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyosensor_duyarlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biosensor',
        HC_PLUGIN_URL . 'modules/biyosensor-duyarlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-biosensor">
        <h3>Biyosensör Duyarlılık Hesaplama</h3>
        <p><small>S = ΔI / (ΔC · A)</small></p>
        
        <div class="hc-form-group">
            <label>Sinyal Değişimi (ΔI, μA)</label>
            <input type="number" id="hc-bs-di" placeholder="Örn: 5" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Konsantrasyon Değişimi (ΔC, mM)</label>
            <input type="number" id="hc-bs-dc" placeholder="Örn: 2" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Elektrot Alanı (A, cm²)</label>
            <input type="number" id="hc-bs-a" placeholder="Örn: 0.126" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcBiosensorHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bs-result">
            <span>Duyarlılık (Sensitivity):</span>
            <div class="hc-result-value" id="hc-bs-res-val">0 μA/mM·cm²</div>
            <small>Not: Genellikle amperometrik sensörler için kullanılır.</small>
        </div>
    </div>
    <?php
}
