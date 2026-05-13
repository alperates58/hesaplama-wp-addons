<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_mutlak_sapma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-mutlak-sapma-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-mutlak-sapma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-mutlak-sapma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-mutlak-sapma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-mutlak-sapma-hesaplama">
        <h3>Ortalama Mutlak Sapma (MAD)</h3>
        <p>Verileri virgül veya boşluk ile giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mad-data">Veri Seti</label>
            <textarea id="hc-mad-data" rows="4" placeholder="10, 15, 20, 25, 30"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMadHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ortalama-mutlak-sapma-hesaplama-result">
            <span class="hc-label">Ortalama Mutlak Sapma:</span>
            <div class="hc-result-value" id="hc-mad-res-value">0</div>
            <div id="hc-mad-res-mean" style="margin-top:10px; color:#666;"></div>
        </div>
    </div>
    <?php
}
