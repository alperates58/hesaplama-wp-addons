<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vize_final_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vize-final',
        HC_PLUGIN_URL . 'modules/vize-final-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vf">
        <h3>Vize Final Notu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vf-vize">Vize Notu:</label>
            <input type="number" id="hc-vf-vize" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-vweight">Vize Ağırlığı (%):</label>
            <input type="number" id="hc-vf-vweight" value="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-final">Final Notu:</label>
            <input type="number" id="hc-vf-final" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-fweight">Final Ağırlığı (%):</label>
            <input type="number" id="hc-vf-fweight" value="60">
        </div>
        <button class="hc-btn" onclick="hcVizeFinalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vize-final-result">
            <strong>Ders Ortalaması:</strong>
            <div id="hc-vf-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
