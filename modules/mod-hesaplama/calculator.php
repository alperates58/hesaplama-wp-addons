<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mod_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mod-hesaplama',
        HC_PLUGIN_URL . 'modules/mod-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mod-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mod-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mod-hesaplama">
        <h3>Mod (Tepe Değer) Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mod-data">Veri Seti</label>
            <textarea id="hc-mod-data" rows="4" placeholder="2, 3, 3, 5, 7, 7, 7, 10"></textarea>
        </div>
        <button class="hc-btn" onclick="hcModBul()">Modu Bul</button>
        <div class="hc-result" id="hc-mod-hesaplama-result">
            <span class="hc-label">Mod (En Sık Değer):</span>
            <div class="hc-result-value" id="hc-mod-res-val">-</div>
            <div id="hc-mod-res-freq" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
