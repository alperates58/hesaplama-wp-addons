<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-dil',
        HC_PLUGIN_URL . 'modules/protein-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-dil-css',
        HC_PLUGIN_URL . 'modules/protein-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein-dil">
        <h3>Protein Seyreltme (C1V1 = C2V2)</h3>
        <div class="hc-form-group">
            <label for="hc-pd-c1">Stok Konsantrasyonu (C1):</label>
            <input type="number" id="hc-pd-c1" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-c2">Hedef Konsantrasyon (C2):</label>
            <input type="number" id="hc-pd-c2" placeholder="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-v2">Hedef Toplam Hacim (V2):</label>
            <input type="number" id="hc-pd-v2" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcProteinDilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-protein-dil-result">
            <div id="hc-pd-res-stok" style="margin-bottom:10px;"></div>
            <div id="hc-pd-res-buffer"></div>
        </div>
    </div>
    <?php
}
