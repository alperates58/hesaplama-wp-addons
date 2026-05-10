<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lenfosit_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lenfosit-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/lenfosit-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lenfosit-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lenfosit-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lymphocyte">
        <h3>Mutlak Lenfosit Sayısı</h3>
        <div class="hc-form-group">
            <label for="hc-ly-wbc">WBC (Beyaz Küre) (hücre/µL)</label>
            <input type="number" id="hc-ly-wbc" placeholder="7000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ly-perc">Lenfosit Oranı (%)</label>
            <input type="number" id="hc-ly-perc" placeholder="30">
        </div>
        <button class="hc-btn" onclick="hcLenfositHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ly-result">
            <div class="hc-result-label">Mutlak Sayı:</div>
            <div class="hc-result-value" id="hc-ly-val">-</div>
            <p id="hc-ly-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
