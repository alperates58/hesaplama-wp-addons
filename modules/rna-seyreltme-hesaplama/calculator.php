<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rna_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rna-dil',
        HC_PLUGIN_URL . 'modules/rna-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rna-dil-css',
        HC_PLUGIN_URL . 'modules/rna-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rna-dil">
        <h3>RNA Seyreltme (C1V1 = C2V2)</h3>
        <div class="hc-form-group">
            <label for="hc-rd-c1">Stok Konsantrasyonu (C1):</label>
            <input type="number" id="hc-rd-c1" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-rd-c2">Hedef Konsantrasyon (C2):</label>
            <input type="number" id="hc-rd-c2" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-rd-v2">Hedef Toplam Hacim (V2):</label>
            <input type="number" id="hc-rd-v2" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcRnaDilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rna-dil-result">
            <div id="hc-rd-res-stok" style="margin-bottom:10px;"></div>
            <div id="hc-rd-res-water"></div>
        </div>
    </div>
    <?php
}
