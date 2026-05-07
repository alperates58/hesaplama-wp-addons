<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isim_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isim-num',
        HC_PLUGIN_URL . 'modules/isim-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isim-num-css',
        HC_PLUGIN_URL . 'modules/isim-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isim-numerolojisi-hesaplama">
        <h3>İsim Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-name-input">Tam Adınız</label>
            <input type="text" id="hc-name-input" placeholder="Adınız ve Soyadınız">
        </div>
        <button class="hc-btn" onclick="hcNameNumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-isim-num-result">
            <div class="hc-result-label">İsim Sayınız:</div>
            <div class="hc-result-value" id="hc-name-val"></div>
            <div class="hc-result-desc" id="hc-name-desc"></div>
        </div>
    </div>
    <?php
}
