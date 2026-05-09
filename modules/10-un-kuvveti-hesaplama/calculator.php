<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_10_un_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pow-10',
        HC_PLUGIN_URL . 'modules/10-un-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pow-10-css',
        HC_PLUGIN_URL . 'modules/10-un-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pow-10">
        <h3>10'un Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-p10-exp">Kuvvet (Üs - n)</label>
            <input type="number" id="hc-p10-exp" placeholder="Örn: 3 veya -2" step="1">
            <small>10ⁿ hesaplanır.</small>
        </div>

        <button class="hc-btn" onclick="hcPow10Hesapla()">Hesapla</button>

        <div class="hc-result" id="hc-p10-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value highlight" id="hc-res-p10-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Bilimsel Gösterim:</span>
                <span class="hc-result-value" id="hc-res-p10-sci">-</span>
            </div>
        </div>
    </div>
    <?php
}
