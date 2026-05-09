<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-seyreltme-hesaplama">
        <h3>DNA Seyreltme (C₁V₁ = C₂V₂)</h3>
        <div class="hc-form-group">
            <label for="hc-ds-c1">Stok Konsantrasyonu (ng/µL)</label>
            <input type="number" id="hc-ds-c1" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-c2">Hedef Konsantrasyon (ng/µL)</label>
            <input type="number" id="hc-ds-c2" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-v2">Hedef Hacim (µL)</label>
            <input type="number" id="hc-ds-v2" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcDNASeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ds-result">
            <div class="hc-ds-grid">
                <div class="hc-ds-item">
                    <span class="hc-result-label">Gereken DNA:</span>
                    <span class="hc-result-value" id="hc-ds-v1">-</span>
                </div>
                <div class="hc-ds-item">
                    <span class="hc-result-label">Gereken Su/Tampon:</span>
                    <span class="hc-result-value" id="hc-ds-water">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
