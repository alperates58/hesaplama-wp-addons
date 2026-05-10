<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pil_geri_donusum_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pil-geri-donusum-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/pil-geri-donusum-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pil-geri-donusum-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pil-geri-donusum-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-battery-recycle">
        <h3>Pil Geri Dönüşüm Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-br-count">Geri Dönüştürülen Pil Sayısı (Adet)</label>
            <input type="number" id="hc-br-count" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcPilGeriDönüşümEtkisiHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-br-result">
            <div id="hc-br-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
