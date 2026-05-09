<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_valf_akis_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-valve-flow',
        HC_PLUGIN_URL . 'modules/valf-akis-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-valve-flow-css',
        HC_PLUGIN_URL . 'modules/valf-akis-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-valve-flow">
        <h3>Valf Akış Hızı (Q)</h3>
        <div class="hc-form-group">
            <label for="hc-vf-cv">Vana Katsayısı (Cv)</label>
            <input type="number" id="hc-vf-cv" value="1.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-dp">Basınç Farkı (ΔP) [PSI]</label>
            <input type="number" id="hc-vf-dp" value="10" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-sg">Sıvı Özgül Ağırlığı (SG)</label>
            <input type="number" id="hc-vf-sg" value="1" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcValveFlowHesapla()">Akış Hızını Hesapla</button>
        <div class="hc-result" id="hc-valve-flow-result">
            <div class="hc-result-item">
                <span>Tahmini Akış (Q):</span>
                <span class="hc-result-value" id="hc-res-vf-val">0 GPM</span>
            </div>
        </div>
    </div>
    <?php
}
