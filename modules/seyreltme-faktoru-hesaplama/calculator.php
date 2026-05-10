<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seyreltme_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seyreltme-faktoru-hesaplama',
        HC_PLUGIN_URL . 'modules/seyreltme-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seyreltme-faktoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/seyreltme-faktoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dilution-factor">
        <h3>Seyreltme Faktörü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-df-v1">Alınan Numune Hacmi (V1)</label>
            <input type="number" id="hc-df-v1" placeholder="Örn: 1">
        </div>
        <div class="hc-form-group">
            <label for="hc-df-v2">Toplam Son Hacim (V2)</label>
            <input type="number" id="hc-df-v2" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcSeyreltmeFaktörüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-df-result">
            <div class="hc-result-label">Seyreltme Faktörü (DF):</div>
            <div class="hc-result-value" id="hc-df-val">-</div>
        </div>
    </div>
    <?php
}
