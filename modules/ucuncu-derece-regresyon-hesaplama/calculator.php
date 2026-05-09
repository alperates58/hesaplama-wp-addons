<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucuncu_derece_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cubic-reg',
        HC_PLUGIN_URL . 'modules/ucuncu-derece-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cubic-reg-css',
        HC_PLUGIN_URL . 'modules/ucuncu-derece-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cubic-reg">
        <h3>Üçüncü Derece (Kübik) Regresyon</h3>
        <div class="hc-form-group">
            <label for="hc-cr-data">X, Y Verileri (Virgül ile ayırın, her satıra bir çift)</label>
            <textarea id="hc-cr-data" placeholder="0, 1&#10;1, 3&#10;2, 10&#10;3, 20"></textarea>
        </div>
        <button class="hc-btn" onclick="hcCubicRegHesapla()">Modeli Hesapla</button>
        <div class="hc-result" id="hc-cubic-reg-result">
            <div class="hc-result-item">
                <span>Denklem:</span>
                <span class="hc-result-value" id="hc-res-cr-eq">y = ax³ + bx² + cx + d</span>
            </div>
            <div class="hc-cr-coefs">
                <div>a: <b id="hc-res-cr-a">0</b></div>
                <div>b: <b id="hc-res-cr-b">0</b></div>
                <div>c: <b id="hc-res-cr-c">0</b></div>
                <div>d: <b id="hc-res-cr-d">0</b></div>
            </div>
        </div>
    </div>
    <?php
}
