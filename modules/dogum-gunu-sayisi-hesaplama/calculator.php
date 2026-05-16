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
            <input type="date" id="hc-bn-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcBirthdayNumberHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogum-gunu-sayisi-hesaplama-result">
            <div class="hc-result-label">Doğum Günü Sayınız:</div>
            <div class="hc-result-value" id="hc-res-bn-val">-</div>
            <div id="hc-res-bn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
