<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koi_boi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-koi-boi-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/koi-boi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-koi-boi-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/koi-boi-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cod-bod">
        <h3>KOİ / BOİ Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cb-cod">KOİ Değeri (mg/L)</label>
            <input type="number" id="hc-cb-cod" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cb-bod">BOİ₅ Değeri (mg/L)</label>
            <input type="number" id="hc-cb-bod" placeholder="Örn: 200">
        </div>
        <button class="hc-btn" onclick="hcKOİBOİOranıHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-cb-result">
            <div class="hc-result-label">KOİ / BOİ Oranı:</div>
            <div class="hc-result-value" id="hc-cb-val">-</div>
            <p id="hc-cb-interpretation" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
