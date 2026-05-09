<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gaz_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gaz-yogunlugu',
        HC_PLUGIN_URL . 'modules/gaz-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gaz-yogunlugu-css',
        HC_PLUGIN_URL . 'modules/gaz-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gaz-yogunlugu">
        <h3>Gaz Yoğunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gy-p">Basınç (atm)</label>
            <input type="number" id="hc-gy-p" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gy-mw">Molekül Ağırlığı (Ma - g/mol)</label>
            <input type="number" id="hc-gy-mw" placeholder="Örn: 44 (CO₂)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gy-t">Sıcaklık (T - °C)</label>
            <input type="number" id="hc-gy-t" placeholder="Örn: 0" step="any">
        </div>
        <button class="hc-btn" onclick="hcGYHesapla()">Yoğunluk Hesapla</button>
        <div class="hc-result" id="hc-gy-result">
            <div class="hc-result-label">Gaz Yoğunluğu (d):</div>
            <div class="hc-result-value" id="hc-gy-val">-</div>
            <div class="hc-result-note">d = (P * Ma) / (R * T)</div>
        </div>
    </div>
    <?php
}
