<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_sertligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-sertligi-hesaplama',
        HC_PLUGIN_URL . 'modules/su-sertligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-su-sertligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/su-sertligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-hardness">
        <h3>Su Sertliği Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-wh-val">Sertlik Değeri (mg/L CaCO₃)</label>
            <input type="number" id="hc-wh-val" placeholder="Örn: 200">
        </div>
        <button class="hc-btn" onclick="hcSuSertliğiHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-wh-result">
            <div id="hc-wh-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
