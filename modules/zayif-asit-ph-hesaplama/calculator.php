<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zayif_asit_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-zayif-asit-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/zayif-asit-ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-zayif-asit-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/zayif-asit-ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weak-acid">
        <h3>Zayıf Asit pH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wa-ka">Asitlik Sabiti (Ka)</label>
            <input type="text" id="hc-wa-ka" placeholder="Örn: 1.8e-5">
        </div>
        <div class="hc-form-group">
            <label for="hc-wa-c">Derişim (M)</label>
            <input type="number" id="hc-wa-c" placeholder="Örn: 0.1">
        </div>
        <button class="hc-btn" onclick="hcZayıfAsitpHHesapla()">pH Hesapla</button>
        <div class="hc-result" id="hc-wa-result">
            <div class="hc-result-label">Çözelti pH:</div>
            <div class="hc-result-value" id="hc-wa-val">-</div>
        </div>
    </div>
    <?php
}
