<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_konsantrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-conc',
        HC_PLUGIN_URL . 'modules/dna-konsantrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-conc-css',
        HC_PLUGIN_URL . 'modules/dna-konsantrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-conc">
        <h3>DNA Konsantrasyonu (A260)</h3>
        <div class="hc-form-group">
            <label for="hc-dc-a260">A260 (Absorbans):</label>
            <input type="number" id="hc-dc-a260" step="0.001" placeholder="0.500">
        </div>
        <div class="hc-form-group">
            <label for="hc-dc-df">Seyreltme Faktörü (Dilution Factor):</label>
            <input type="number" id="hc-dc-df" step="1" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-dc-type">DNA Tipi:</label>
            <select id="hc-dc-type">
                <option value="50">Çift Sarmallı DNA (dsDNA)</option>
                <option value="33">Tek Sarmallı DNA (ssDNA)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDnaConcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dna-conc-result">
            <strong>Konsantrasyon:</strong>
            <div id="hc-dc-res-val" class="hc-result-value">-</div>
            <span>µg / mL (veya ng / µL)</span>
        </div>
    </div>
    <?php
}
