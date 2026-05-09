<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_z_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-z-score',
        HC_PLUGIN_URL . 'modules/z-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-z-score-css',
        HC_PLUGIN_URL . 'modules/z-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-z-score">
        <h3>Z-Skoru Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-zs-val">Veri Değeri (x)</label>
            <input type="number" id="hc-zs-val" value="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-zs-mean">Ortalama (μ)</label>
            <input type="number" id="hc-zs-mean" value="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-zs-std">Standart Sapma (σ)</label>
            <input type="number" id="hc-zs-std" value="10">
        </div>
        <button class="hc-btn" onclick="hcZScoreHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-z-score-result">
            <div class="hc-result-item">
                <span>Z-Skoru:</span>
                <span class="hc-result-value" id="hc-res-zs-val">0</span>
            </div>
            <p class="hc-zs-note">Z-skoru, bir değerin ortalamanın ne kadar üzerinde veya altında olduğunu gösterir.</p>
        </div>
    </div>
    <?php
}
