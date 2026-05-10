<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_michaelis_sabiti_km_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-km-calc',
        HC_PLUGIN_URL . 'modules/michaelis-sabiti-km-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-km-calc-css',
        HC_PLUGIN_URL . 'modules/michaelis-sabiti-km-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-km-calc">
        <h3>Km Hesaplama (Enzim Kinetiği)</h3>
        <div class="hc-form-group">
            <label for="hc-km-v">Reaksiyon Hızı (v):</label>
            <input type="number" id="hc-km-v" step="0.01" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-km-s">Substrat Konsantrasyonu [S]:</label>
            <input type="number" id="hc-km-s" step="0.01" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-km-vmax">Maksimum Hız (Vmax):</label>
            <input type="number" id="hc-km-vmax" step="0.01" placeholder="15.0">
        </div>
        <button class="hc-btn" onclick="hcKmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-km-calc-result">
            <strong>Michaelis Sabiti (Km):</strong>
            <div id="hc-km-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
