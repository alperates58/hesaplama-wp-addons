<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplam_su_sertligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-toplam-su-sertligi-hesaplama',
        HC_PLUGIN_URL . 'modules/toplam-su-sertligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-toplam-su-sertligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/toplam-su-sertligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-total-hardness">
        <h3>Toplam Su Sertliği (Ca + Mg)</h3>
        <div class="hc-form-group">
            <label for="hc-th-ca">Kalsiyum (Ca²⁺) (mg/L)</label>
            <input type="number" id="hc-th-ca" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-th-mg">Magnezyum (Mg²⁺) (mg/L)</label>
            <input type="number" id="hc-th-mg" placeholder="Örn: 24">
        </div>
        <button class="hc-btn" onclick="hcToplamSuSertliğiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-th-result">
            <div class="hc-result-label">Toplam Sertlik:</div>
            <div class="hc-result-value" id="hc-th-val">-</div>
        </div>
    </div>
    <?php
}
