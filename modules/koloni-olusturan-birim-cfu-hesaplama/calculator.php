<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koloni_olusturan_birim_cfu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cfu-calc',
        HC_PLUGIN_URL . 'modules/koloni-olusturan-birim-cfu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cfu-calc-css',
        HC_PLUGIN_URL . 'modules/koloni-olusturan-birim-cfu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cfu-calc">
        <h3>CFU (Koloni Sayısı) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cf-colonies">Sayılabilen Koloni Sayısı (CFU):</label>
            <input type="number" id="hc-cf-colonies" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-cf-df">Seyreltme Faktörü (Dilution Factor):</label>
            <input type="number" id="hc-cf-df" placeholder="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cf-vol">Ekilen Hacim (mL):</label>
            <input type="number" id="hc-cf-vol" step="0.1" placeholder="0.1">
        </div>
        <button class="hc-btn" onclick="hcCfuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cfu-calc-result">
            <strong>Mikrobiyal Yük:</strong>
            <div id="hc-cf-res-val" class="hc-result-value">-</div>
            <span>CFU / mL</span>
        </div>
    </div>
    <?php
}
