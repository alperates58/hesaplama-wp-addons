<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_medyan_mutlak_sapma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-medyan-mutlak-sapma-hesaplama',
        HC_PLUGIN_URL . 'modules/medyan-mutlak-sapma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-medyan-mutlak-sapma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/medyan-mutlak-sapma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-medyan-mutlak-sapma-hesaplama">
        <h3>Medyan Mutlak Sapma (MAD)</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mmad-data">Veri Seti</label>
            <textarea id="hc-mmad-data" rows="4" placeholder="1, 1, 2, 2, 4, 6, 9"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMmadHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-medyan-mutlak-sapma-hesaplama-result">
            <span class="hc-label">Medyan Mutlak Sapma:</span>
            <div class="hc-result-value" id="hc-mmad-res-val">0</div>
            <div id="hc-mmad-res-median" style="margin-top:10px; color:#666;"></div>
        </div>
    </div>
    <?php
}
