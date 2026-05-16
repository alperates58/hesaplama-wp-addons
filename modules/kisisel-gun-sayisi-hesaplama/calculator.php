<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_gun_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-gun-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-gun-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-gun-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-gun-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-day">
        <h3>Kişisel Gün Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-pd-birth" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-target">Hesaplanacak Gün:</label>
            <input type="date" id="hc-pd-target" class="hc-input" value="2026-01-01">
        </div>
        <button class="hc-btn" onclick="hcKisiselGunHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kisisel-gun-sayisi-hesaplama-result">
            <div class="hc-result-label">Kişisel Gün Sayınız:</div>
            <div class="hc-result-value" id="hc-res-pd-val">-</div>
            <div id="hc-res-pd-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
