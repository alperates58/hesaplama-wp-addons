<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_konsantrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-conc',
        HC_PLUGIN_URL . 'modules/protein-konsantrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-conc-css',
        HC_PLUGIN_URL . 'modules/protein-konsantrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein-conc">
        <h3>Protein Konsantrasyonu (A280)</h3>
        <div class="hc-form-group">
            <label for="hc-pc-a280">A280 (Absorbans):</label>
            <input type="number" id="hc-pc-a280" step="0.001" placeholder="0.800">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-coeff">Ekstinksiyon Katsayısı (ε) [L/mol·cm]:</label>
            <input type="number" id="hc-pc-coeff" step="1" placeholder="1.0">
            <small>Bilinmiyorsa 1.0 (standart IgG yaklasımı) bırakın.</small>
        </div>
        <button class="hc-btn" onclick="hcProteinConcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-protein-conc-result">
            <strong>Konsantrasyon:</strong>
            <div id="hc-pc-res-val" class="hc-result-value">-</div>
            <span>mg / mL</span>
        </div>
    </div>
    <?php
}
