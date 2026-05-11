<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nakit_yakma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nakit-yakma-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/nakit-yakma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nakit-yakma-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nakit-yakma-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nakit-yakma-hizi">
        <h3>Nakit Yakma Hızı Hesaplama (Burn Rate)</h3>
        <div class="hc-form-group">
            <label for="hc-nyh-start">Dönem Başı Nakit (₺)</label>
            <input type="number" id="hc-nyh-start" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-nyh-end">Dönem Sonu Nakit (₺)</label>
            <input type="number" id="hc-nyh-end" placeholder="Örn: 800.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-nyh-months">Dönem Süresi (Ay)</label>
            <input type="number" id="hc-nyh-months" placeholder="Örn: 4">
        </div>
        <button class="hc-btn" onclick="hcNakitYakmaHiziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nyh-result">
            <div class="hc-result-item">
                <span>Aylık Nakit Yakma Hızı:</span>
                <strong class="hc-result-value" id="hc-nyh-rate">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Nakit Tükenme Süresi (Runway):</span>
                <strong id="hc-nyh-runway">-</strong>
            </div>
        </div>
    </div>
    <?php
}
