<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_azalis_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-decrease-calc',
        HC_PLUGIN_URL . 'modules/azalis-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-decrease-calc-css',
        HC_PLUGIN_URL . 'modules/azalis-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-decrease">
        <h3>Azalış Oranı (%) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dr-old">Eski Değer (İlk Değer)</label>
            <input type="number" id="hc-dr-old" placeholder="Örn: 500" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-dr-new">Yeni Değer (Son Değer)</label>
            <input type="number" id="hc-dr-new" placeholder="Örn: 400" step="any">
        </div>

        <button class="hc-btn" onclick="hcAzalisHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dr-result">
            <div class="hc-result-item">
                <span>Azalış Oranı:</span>
                <span class="hc-result-value highlight" id="hc-res-dr-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Fark:</span>
                <span class="hc-result-value" id="hc-res-dr-diff">-</span>
            </div>
        </div>
    </div>
    <?php
}
