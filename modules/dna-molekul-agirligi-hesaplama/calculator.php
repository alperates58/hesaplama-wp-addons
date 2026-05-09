<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_molekul_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-molekul-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-molekul-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-molekul-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-molekul-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-molekul-agirligi-hesaplama">
        <h3>DNA Molekül Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mw-length">DNA Uzunluğu (bp)</label>
            <input type="number" id="hc-mw-length" placeholder="Örn: 3000" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-mw-type">DNA Tipi</label>
            <select id="hc-mw-type">
                <option value="double">Çift Sarmal (dsDNA)</option>
                <option value="single">Tek Sarmal (ssDNA)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDNAMWHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mw-result">
            <div class="hc-result-label">Molekül Ağırlığı:</div>
            <div class="hc-result-value" id="hc-mw-val">-</div>
            <div class="hc-result-note">Birimi: Da (Dalton) veya g/mol</div>
        </div>
    </div>
    <?php
}
