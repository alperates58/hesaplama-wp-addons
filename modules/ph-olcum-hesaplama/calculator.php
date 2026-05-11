<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ph_olcum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ph',
        HC_PLUGIN_URL . 'modules/ph-olcum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ph">
        <h3>pH / pOH Ölçüm Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ph-h-conc">H<sup>+</sup> İyonu Konsantrasyonu (mol/L)</label>
            <input type="number" id="hc-ph-h-conc" placeholder="Örn: 0.001" step="any">
        </div>

        <button class="hc-btn" onclick="hcPhHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-ph-result">
            <div class="hc-result-item">
                <span class="hc-result-label">pH Değeri:</span>
                <span class="hc-result-value" id="hc-ph-res-ph">--</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">pOH Değeri:</span>
                <span id="hc-ph-res-poh">--</span>
            </div>
            <p id="hc-ph-type" style="text-align:center; font-weight:600; margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
