<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dal_yaprak_grafigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dal-yaprak-grafigi-hesaplama',
        HC_PLUGIN_URL . 'modules/dal-yaprak-grafigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dal-yaprak-grafigi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dal-yaprak-grafigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stem-leaf">
        <h3>Dal-Yaprak Grafiği (Stem-and-Leaf Plot)</h3>
        <div class="hc-form-group">
            <label for="hc-sl-data">Veri Seti (Pozitif Tam Sayılar):</label>
            <textarea id="hc-sl-data" class="hc-input" placeholder="Örn: 12, 15, 22, 23, 23, 31, 35, 40"></textarea>
        </div>
        <button class="hc-btn" onclick="hcStemLeafHesapla()">Grafiği Oluştur</button>
        <div class="hc-result" id="hc-dal-yaprak-grafigi-hesaplama-result">
            <div class="hc-result-label">Dal | Yaprak:</div>
            <div id="hc-sl-display" class="hc-sl-box"></div>
        </div>
    </div>
    <?php
}
