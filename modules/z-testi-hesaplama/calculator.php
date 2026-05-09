<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_z_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-z-test',
        HC_PLUGIN_URL . 'modules/z-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-z-test-css',
        HC_PLUGIN_URL . 'modules/z-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-z-test">
        <h3>Z-Testi Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-zt-mean">Örneklem Ortalaması (x̄)</label>
            <input type="number" id="hc-zt-mean" value="105" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-zt-pop-mean">Popülasyon Ortalaması (μ)</label>
            <input type="number" id="hc-zt-pop-mean" value="100" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-zt-std">Popülasyon Standart Sapması (σ)</label>
            <input type="number" id="hc-zt-std" value="15" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-zt-n">Örneklem Boyutu (n)</label>
            <input type="number" id="hc-zt-n" value="30" min="1">
        </div>
        <button class="hc-btn" onclick="hcZTestHesapla()">Z-Değerini Hesapla</button>
        <div class="hc-result" id="hc-z-test-result">
            <div class="hc-result-item"> <span>Z-Puanı:</span> <b id="hc-res-zt-val">0</b> </div>
            <div class="hc-result-item"> <span>P-Değeri:</span> <b id="hc-res-zt-p">0</b> </div>
            <p id="hc-zt-sig" class="hc-zt-note"></p>
        </div>
    </div>
    <?php
}
