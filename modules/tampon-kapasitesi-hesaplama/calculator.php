<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tampon_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tampon-kapasitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/tampon-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tampon-kapasitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tampon-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buffer-cap">
        <h3>Tampon Kapasitesi (β) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bc-mol">Eklenen Asit/Baz Miktarı (mol)</label>
            <input type="number" id="hc-bc-mol" placeholder="Örn: 0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-ph1">Başlangıç pH</label>
            <input type="number" id="hc-bc-ph1" placeholder="Örn: 7.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-ph2">Son pH</label>
            <input type="number" id="hc-bc-ph2" placeholder="Örn: 7.15" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcTamponKapasitesiHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-label">Tampon Kapasitesi (β):</div>
            <div class="hc-result-value" id="hc-bc-val">-</div>
        </div>
    </div>
    <?php
}
