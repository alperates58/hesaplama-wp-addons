<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_ligasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-ligasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-ligasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-ligasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-ligasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-ligasyon-hesaplama">
        <h3>DNA Ligasyon Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lig-v-amount">Vektör Miktarı (ng)</label>
            <input type="number" id="hc-lig-v-amount" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-lig-v-size">Vektör Uzunluğu (bp veya kb)</label>
            <input type="number" id="hc-lig-v-size" placeholder="Örn: 4000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-lig-i-size">Insert Uzunluğu (bp veya kb)</label>
            <input type="number" id="hc-lig-i-size" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-lig-ratio">Molar Oran (Insert:Vektör)</label>
            <select id="hc-lig-ratio">
                <option value="1">1:1</option>
                <option value="3" selected>3:1</option>
                <option value="5">5:1</option>
                <option value="10">10:1</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDNALigasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lig-result">
            <div class="hc-result-label">Gereken Insert Miktarı:</div>
            <div class="hc-result-value" id="hc-lig-val">-</div>
            <div class="hc-result-note" id="hc-lig-note"></div>
        </div>
    </div>
    <?php
}
