<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_yil_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-yil-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-yil-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-yil-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-yil-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-year">
        <h3>Kişisel Yıl Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-py-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-py-birth" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label for="hc-py-target">Hesaplanacak Yıl:</label>
            <input type="number" id="hc-py-target" class="hc-input" value="2026">
        </div>
        <button class="hc-btn" onclick="hcKisiselYilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kisisel-yil-sayisi-hesaplama-result">
            <div class="hc-result-label">Kişisel Yıl Sayınız (2026):</div>
            <div class="hc-result-value" id="hc-res-py-val">-</div>
            <div id="hc-res-py-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
