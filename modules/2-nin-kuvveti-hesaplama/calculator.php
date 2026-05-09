<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_2_nin_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pow-2',
        HC_PLUGIN_URL . 'modules/2-nin-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pow-2-css',
        HC_PLUGIN_URL . 'modules/2-nin-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pow-2">
        <h3>2'nin Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-p2-exp">Kuvvet (Üs - n)</label>
            <input type="number" id="hc-p2-exp" placeholder="Örn: 8 veya 10" step="1">
            <small>2ⁿ hesaplanır.</small>
        </div>

        <button class="hc-btn" onclick="hcPow2Hesapla()">Hesapla</button>

        <div class="hc-result" id="hc-p2-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value highlight" id="hc-res-p2-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Bit Karşılığı:</span>
                <span class="hc-result-value" id="hc-res-p2-bits">-</span>
            </div>
        </div>
    </div>
    <?php
}
