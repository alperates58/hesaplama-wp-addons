<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_besinci_dereceden_kok_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fifth-root',
        HC_PLUGIN_URL . 'modules/besinci-dereceden-kok-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fifth-root-css',
        HC_PLUGIN_URL . 'modules/besinci-dereceden-kok-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-5th-root">
        <h3>Beşinci Dereceden Kök (⁵√)</h3>
        
        <div class="hc-form-group">
            <label for="hc-fr-val">Sayı (x)</label>
            <input type="number" id="hc-fr-val" placeholder="Örn: 32" step="any">
        </div>

        <button class="hc-btn" onclick="hcBesinciKokHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fr-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value highlight" id="hc-res-fr-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kuvvet Karşılığı:</span>
                <span class="hc-result-value" id="hc-res-fr-pow">-</span>
            </div>
        </div>
    </div>
    <?php
}
