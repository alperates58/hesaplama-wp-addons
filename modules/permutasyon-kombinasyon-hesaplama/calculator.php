<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_permutasyon_kombinasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-perm-comb',
        HC_PLUGIN_URL . 'modules/permutasyon-kombinasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-perm-comb-css',
        HC_PLUGIN_URL . 'modules/permutasyon-kombinasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pc">
        <h3>Permütasyon & Kombinasyon</h3>
        <div class="hc-form-group">
            <label for="hc-pc-n">n (Eleman Sayısı):</label>
            <input type="number" id="hc-pc-n" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-r">r (Seçim Sayısı):</label>
            <input type="number" id="hc-pc-r" placeholder="2">
        </div>
        <button class="hc-btn" onclick="hcPcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-pc-res">
                <strong>Permütasyon P(n,r):</strong>
                <div id="hc-pc-perm" class="hc-result-value">-</div>
            </div>
            <div class="hc-pc-res" style="margin-top:15px;">
                <strong>Kombinasyon C(n,r):</strong>
                <div id="hc-pc-comb" class="hc-result-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
