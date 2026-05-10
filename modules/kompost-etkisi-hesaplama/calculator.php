<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompost_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kompost-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kompost-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kompost-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kompost-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-compost">
        <h3>Kompost Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ct-weight">Haftalık Kompost Edilen Atık (kg)</label>
            <input type="number" id="hc-ct-weight" placeholder="Örn: 3">
        </div>
        <button class="hc-btn" onclick="hcKompostEtkisiHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-ct-result">
            <div id="hc-ct-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
