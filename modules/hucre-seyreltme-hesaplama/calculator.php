<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hucre_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hucre-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/hucre-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hucre-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hucre-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hucre-seyreltme-hesaplama">
        <h3>Hücre Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cs-c1">Stok Konsantrasyonu (hücre/mL)</label>
            <input type="number" id="hc-cs-c1" placeholder="Örn: 1000000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cs-c2">Hedef Konsantrasyon (hücre/mL)</label>
            <input type="number" id="hc-cs-c2" placeholder="Örn: 100000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cs-v2">Hedef Hacim (mL)</label>
            <input type="number" id="hc-cs-v2" placeholder="Örn: 5" step="any">
        </div>
        <button class="hc-btn" onclick="hcHucreSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cs-result">
            <div class="hc-cs-grid">
                <div class="hc-cs-item">
                    <span class="hc-result-label">Gereken Hücre Stoku:</span>
                    <span class="hc-result-value" id="hc-cs-v1">-</span>
                </div>
                <div class="hc-cs-item">
                    <span class="hc-result-label">Gereken Besiyeri:</span>
                    <span class="hc-result-value" id="hc-cs-med">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
