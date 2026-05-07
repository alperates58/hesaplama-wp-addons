<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ppm_molarite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppm-molarite-hesaplama',
        HC_PLUGIN_URL . 'modules/ppm-molarite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppm-molarite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ppm-molarite-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ppm-molarite-hesaplama">
        <div class="hc-header">
            <h3>PPM'den Molarite Hesaplama</h3>
            <p>Çözeltideki PPM değerini molar konsantrasyona (mol/L) dönüştürün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-ppm-val">PPM Değeri (mg/L)</label>
                <input type="number" id="hc-ppm-val" placeholder="Örn: 500" step="0.001">
            </div>

            <div class="hc-form-group">
                <label for="hc-molar-mass">Mol Kütlesi (g/mol)</label>
                <input type="number" id="hc-molar-mass" placeholder="Örn: 58.44 (NaCl)" step="0.01">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPpmMolariteHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ppm-result">
            <div class="hc-result-label">Molarite (M)</div>
            <div class="hc-result-main">
                <span id="hc-res-molarity">-</span>
                <small>mol / L</small>
            </div>
            
            <div class="hc-formula-box">
                M = PPM / (Mol Kütlesi × 1000)
            </div>
        </div>
    </div>
    <?php
}
