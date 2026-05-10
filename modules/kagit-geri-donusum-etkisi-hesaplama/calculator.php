<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kagit_geri_donusum_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kagit-geri-donusum-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kagit-geri-donusum-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kagit-geri-donusum-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kagit-geri-donusum-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paper-recycle">
        <h3>Kağıt Geri Dönüşüm Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-pr-weight">Geri Dönüştürülen Kağıt (kg)</label>
            <input type="number" id="hc-pr-weight" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcKağıtGeriDönüşümEtkisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pr-result">
            <div id="hc-pr-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
