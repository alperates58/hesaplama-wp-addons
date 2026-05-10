<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_nabiz_bolgesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hedef-nabiz-bolgesi-hesaplama',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hedef-nabiz-bolgesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-zones">
        <h3>Hedef Nabız Bölgeleri</h3>
        <div class="hc-form-group">
            <label for="hc-hz-age">Yaşınız</label>
            <input type="number" id="hc-hz-age" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcHedefNabızBölgesiHesapla()">Bölgeleri Hesapla</button>
        <div class="hc-result" id="hc-hz-result">
            <div id="hc-hz-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
