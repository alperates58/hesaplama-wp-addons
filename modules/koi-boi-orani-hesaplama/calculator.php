<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koi_boi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cod-bod',
        HC_PLUGIN_URL . 'modules/koi-boi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cod-bod-css',
        HC_PLUGIN_URL . 'modules/koi-boi-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cod-bod">
        <h3>KOİ / BOİ Oranı Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-cb-koi">KOİ (Kimyasal Oksijen İhtiyacı) [mg/L]:</label>
            <input type="number" id="hc-cb-koi" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cb-boi">BOİ (Biyokimyasal Oksijen İhtiyacı) [mg/L]:</label>
            <input type="number" id="hc-cb-boi" placeholder="200">
        </div>
        <button class="hc-btn" onclick="hcKoiBoiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cod-bod-result">
            <strong>Oran (KOİ / BOİ):</strong>
            <div id="hc-cb-res-val" class="hc-result-value">-</div>
            <p id="hc-cb-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
