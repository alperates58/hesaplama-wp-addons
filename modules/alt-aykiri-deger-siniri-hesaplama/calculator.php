<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alt_aykiri_deger_siniri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alt-aykiri-deger-siniri-hesaplama',
        HC_PLUGIN_URL . 'modules/alt-aykiri-deger-siniri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alt-aykiri-deger-siniri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alt-aykiri-deger-siniri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lower-outlier">
        <h3>Alt Aykırı Değer Sınırı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lo-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-lo-data" class="hc-input" placeholder="Örn: 2, 50, 55, 60, 65"></textarea>
        </div>
        <button class="hc-btn" onclick="hcLowerOutlierHesapla()">Sınırı Hesapla</button>
        <div class="hc-result" id="hc-alt-aykiri-deger-siniri-hesaplama-result">
            <div class="hc-result-label">Alt Aykırı Değer Sınırı:</div>
            <div class="hc-result-value" id="hc-res-lo-val">-</div>
            <p id="hc-lo-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
