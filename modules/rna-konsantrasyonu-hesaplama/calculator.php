<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rna_konsantrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rna-conc',
        HC_PLUGIN_URL . 'modules/rna-konsantrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rna-conc-css',
        HC_PLUGIN_URL . 'modules/rna-konsantrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rna-conc">
        <h3>RNA Konsantrasyonu (A260)</h3>
        <div class="hc-form-group">
            <label for="hc-rc-a260">A260 (Absorbans):</label>
            <input type="number" id="hc-rc-a260" step="0.001" placeholder="0.400">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-df">Seyreltme Faktörü:</label>
            <input type="number" id="hc-rc-df" step="1" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcRnaConcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rna-conc-result">
            <strong>Konsantrasyon:</strong>
            <div id="hc-rc-res-val" class="hc-result-value">-</div>
            <span>µg / mL (veya ng / µL)</span>
        </div>
    </div>
    <?php
}
