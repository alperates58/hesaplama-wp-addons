<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_gunu_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-gunu-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/dogum-gunu-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-gunu-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogum-gunu-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-birthday-number">
        <h3>Doğum Günü Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bn-date">Doğum Tarihiniz:</label>
            <input type="date" id="hc-bn-date" class="hc-input" value="1990-01-01">
        </div>
        <button class="hc-btn" onclick="hcDogumGunuSayisiHesapla()">Sayımı Hesapla</button>
        <div class="hc-result" id="hc-birthday-number-result">
            <div class="hc-bn-val" id="hc-bn-val">-</div>
            <div id="hc-bn-desc" class="hc-bn-desc"></div>
        </div>
    </div>
    <?php
}
