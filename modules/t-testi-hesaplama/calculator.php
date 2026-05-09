<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_t_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-t-test',
        HC_PLUGIN_URL . 'modules/t-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-t-test-css',
        HC_PLUGIN_URL . 'modules/t-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-t-test">
        <h3>T-Testi (Tek Örneklem)</h3>
        <div class="hc-form-group">
            <label for="hc-tt-data">Örneklem Verileri (Virgül ile)</label>
            <textarea id="hc-tt-data" placeholder="Örn: 10, 12, 11, 13, 10"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-tt-mu">Popülasyon Ortalaması (μ)</label>
            <input type="number" id="hc-tt-mu" value="10" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcTTestHesapla()">Testi Çalıştır</button>
        <div class="hc-result" id="hc-t-test-result">
            <div class="hc-result-item"> <span>T-Değeri:</span> <b id="hc-res-tt-val">0</b> </div>
            <div class="hc-result-item"> <span>Serbestlik Der. (df):</span> <b id="hc-res-tt-df">0</b> </div>
            <p id="hc-tt-note" class="hc-tt-note"></p>
        </div>
    </div>
    <?php
}
