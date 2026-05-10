<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metal_geri_donusum_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-metal-geri-donusum-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/metal-geri-donusum-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-metal-geri-donusum-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/metal-geri-donusum-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-metal-recycle">
        <h3>Metal Geri Dönüşüm Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-mr-alu">Alüminyum Kutu / Atık (kg)</label>
            <input type="number" id="hc-mr-alu" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mr-steel">Çelik / Demir Atık (kg)</label>
            <input type="number" id="hc-mr-steel" placeholder="0">
        </div>
        <button class="hc-btn" onclick="hcMetalGeriDönüşümEtkisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mr-result">
            <div id="hc-mr-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
