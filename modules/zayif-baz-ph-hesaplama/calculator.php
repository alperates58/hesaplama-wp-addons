<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zayif_baz_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-zayif-baz-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/zayif-baz-ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-zayif-baz-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/zayif-baz-ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weak-base">
        <h3>Zayıf Baz pH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wb-kb">Bazlık Sabiti (Kb)</label>
            <input type="text" id="hc-wb-kb" placeholder="Örn: 1.8e-5">
        </div>
        <div class="hc-form-group">
            <label for="hc-wb-c">Derişim (M)</label>
            <input type="number" id="hc-wb-c" placeholder="Örn: 0.1">
        </div>
        <button class="hc-btn" onclick="hcZayıfBazpHHesapla()">pH Hesapla</button>
        <div class="hc-result" id="hc-wb-result">
            <div class="hc-result-label">Çözelti pH:</div>
            <div class="hc-result-value" id="hc-wb-val">-</div>
        </div>
    </div>
    <?php
}
