<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigma_seviyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sigma-level',
        HC_PLUGIN_URL . 'modules/sigma-seviyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigma-level-css',
        HC_PLUGIN_URL . 'modules/sigma-seviyesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sigma-level">
        <h3>Sigma Seviyesi Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-sl-opp">Toplam Fırsat Sayısı</label>
            <input type="number" id="hc-sl-opp" value="10000" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-def">Hata (Defect) Sayısı</label>
            <input type="number" id="hc-sl-def" value="34" min="0">
        </div>
        <button class="hc-btn" onclick="hcSigmaLevelHesapla()">Sigma Seviyesini Gör</button>
        <div class="hc-result" id="hc-sigma-level-result">
            <div class="hc-result-item">
                <span>DPMO (Milyonda Hata):</span>
                <span id="hc-res-sl-dpmo">0</span>
            </div>
            <div class="hc-result-item">
                <span>Sigma Seviyesi:</span>
                <span class="hc-result-value" id="hc-res-sl-val">0</span>
            </div>
            <p class="hc-sl-note">Not: 1.5 sigma kayması (shift) dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
