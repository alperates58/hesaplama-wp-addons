<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rastgele_sayi_uretme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-random-num',
        HC_PLUGIN_URL . 'modules/rastgele-sayi-uretme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-random-num-css',
        HC_PLUGIN_URL . 'modules/rastgele-sayi-uretme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-random-num">
        <h3>Rastgele Sayı Üretici</h3>
        <div class="hc-form-group">
            <label for="hc-rnd-min">Minimum</label>
            <input type="number" id="hc-rnd-min" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rnd-max">Maksimum</label>
            <input type="number" id="hc-rnd-max" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-rnd-count">Kaç Adet?</label>
            <input type="number" id="hc-rnd-count" value="1" min="1" max="100">
        </div>
        <button class="hc-btn" onclick="hcRandomNumHesapla()">Sayı Üret</button>
        <div class="hc-result" id="hc-random-num-result">
            <div id="hc-res-rnd-list" class="hc-rnd-list"></div>
        </div>
    </div>
    <?php
}
