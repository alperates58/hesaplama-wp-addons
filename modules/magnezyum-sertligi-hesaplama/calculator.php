<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_magnezyum_sertligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-magnezyum-sertligi-hesaplama',
        HC_PLUGIN_URL . 'modules/magnezyum-sertligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-magnezyum-sertligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/magnezyum-sertligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mg-hardness">
        <h3>Magnezyum Sertliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mh-mg">Mg²⁺ Derişimi (mg/L veya ppm)</label>
            <input type="number" id="hc-mh-mg" placeholder="Örn: 24">
        </div>
        <button class="hc-btn" onclick="hcMagnezyumSertliğiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mh-result">
            <div class="hc-result-label">Magnezyum Sertliği (CaCO₃ eşd.):</div>
            <div class="hc-result-value" id="hc-mh-val">-</div>
        </div>
    </div>
    <?php
}
