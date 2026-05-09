<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ustel_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-reg',
        HC_PLUGIN_URL . 'modules/ustel-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-exp-reg-css',
        HC_PLUGIN_URL . 'modules/ustel-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-exp-reg">
        <h3>Üstel Regresyon</h3>
        <div class="hc-form-group">
            <label for="hc-er-data">X, Y Veri Çiftleri (Her satıra bir çift)</label>
            <textarea id="hc-er-data" placeholder="1, 2.5&#10;2, 7.1&#10;3, 20.2"></textarea>
        </div>
        <button class="hc-btn" onclick="hcExpRegHesapla()">Modeli Oluştur</button>
        <div class="hc-result" id="hc-exp-reg-result">
            <div class="hc-result-item">
                <span>Denklem:</span>
                <span class="hc-result-value" id="hc-res-er-eq">y = a * e^(bx)</span>
            </div>
            <div class="hc-er-params">
                <div>a: <b id="hc-res-er-a">0</b></div>
                <div>b: <b id="hc-res-er-b">0</b></div>
            </div>
        </div>
    </div>
    <?php
}
