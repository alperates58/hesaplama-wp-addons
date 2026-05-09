<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_oran_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basic-ratio',
        HC_PLUGIN_URL . 'modules/basit-oran-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basic-ratio-css',
        HC_PLUGIN_URL . 'modules/basit-oran-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ratio">
        <h3>Basit Oran Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-br-v1">1. Sayı (A)</label>
            <input type="number" id="hc-br-v1" placeholder="Örn: 12" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-br-v2">2. Sayı (B)</label>
            <input type="number" id="hc-br-v2" placeholder="Örn: 18" step="any">
        </div>

        <button class="hc-btn" onclick="hcOranHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-br-result">
            <div class="hc-result-item">
                <span>Oran (A:B):</span>
                <span class="hc-result-value highlight" id="hc-res-br-ratio">-</span>
            </div>
            <div class="hc-result-item">
                <span>Ondalık Değer:</span>
                <span class="hc-result-value" id="hc-res-br-dec">-</span>
            </div>
        </div>
    </div>
    <?php
}
