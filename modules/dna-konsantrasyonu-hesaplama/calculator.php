<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_konsantrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-konsantrasyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-konsantrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-konsantrasyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-konsantrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-konsantrasyonu-hesaplama">
        <h3>DNA Konsantrasyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dna-a260">Absorbans (A₂₆₀)</label>
            <input type="number" id="hc-dna-a260" placeholder="Örn: 0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dna-df">Seyreltme Faktörü</label>
            <input type="number" id="hc-dna-df" placeholder="Örn: 50" step="any" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-dna-type">DNA Tipi</label>
            <select id="hc-dna-type">
                <option value="50">Çift Sarmal DNA (dsDNA)</option>
                <option value="33">Tek Sarmal DNA (ssDNA)</option>
                <option value="40">RNA</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDNAKonsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dna-conc-result">
            <div class="hc-result-label">Konsantrasyon:</div>
            <div class="hc-result-value" id="hc-dna-conc-val">-</div>
            <div class="hc-result-note" id="hc-dna-conc-note"></div>
        </div>
    </div>
    <?php
}
