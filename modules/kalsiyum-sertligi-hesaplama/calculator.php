<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalsiyum_sertligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ca-hardness',
        HC_PLUGIN_URL . 'modules/kalsiyum-sertligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ca-hardness-css',
        HC_PLUGIN_URL . 'modules/kalsiyum-sertligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ca-hardness">
        <h3>Kalsiyum Sertliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ks-ca">Kalsiyum İyonu Derişimi (mg/L Ca²⁺)</label>
            <input type="number" id="hc-ks-ca" placeholder="Örn: 40" step="any">
        </div>
        <button class="hc-btn" onclick="hcKSHesapla()">Sertlik Hesapla</button>
        <div class="hc-result" id="hc-ks-result">
            <div class="hc-result-label">Kalsiyum Sertliği (mg/L CaCO₃):</div>
            <div class="hc-result-value" id="hc-ks-val">-</div>
            <div class="hc-result-note">Faktör: mg/L Ca²⁺ * 2.497</div>
        </div>
    </div>
    <?php
}
