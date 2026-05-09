<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilometre_litre_yakit_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-km-l-efficiency',
        HC_PLUGIN_URL . 'modules/kilometre-litre-yakit-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kml-box">
        <h3>km/L Yakıt Verimi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Kat Edilen Mesafe (km)</label>
            <input type="number" id="hc-kml-dist" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label>Harcanan Yakıt (Litre)</label>
            <input type="number" id="hc-kml-fuel" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcKmlHesapla()">Verimi Hesapla</button>
        <div class="hc-result" id="hc-kml-result">
            <div class="hc-result-title">Yakıt Verimi (km/L):</div>
            <div class="hc-result-value" id="hc-kml-val">-</div>
            <p id="hc-kml-conv" style="font-size: 0.9em; margin-top: 10px;"></p>
        </div>
    </div>
    <?php
}
