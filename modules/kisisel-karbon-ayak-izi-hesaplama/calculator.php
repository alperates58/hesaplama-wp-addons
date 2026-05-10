<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-carbon">
        <h3>Kişisel Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-pc-house">Hane Büyüklüğü (Kişi)</label>
            <input type="number" id="hc-pc-house" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-car">Yıllık Araba Kullanımı (km)</label>
            <input type="number" id="hc-pc-car" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-flights">Yıllık Uçuş Sayısı (Kısa Mesafe < 3 saat)</label>
            <input type="number" id="hc-pc-flights" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-meat">Beslenme Tarzı</label>
            <select id="hc-pc-meat">
                <option value="2.5">Çok Etli</option>
                <option value="1.8" selected>Az Etli</option>
                <option value="1.2">Vejetaryen / Vegan</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKişiselKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-label">Yıllık Karbon Ayak İziniz:</div>
            <div class="hc-result-value" id="hc-pc-val">-</div>
        </div>
    </div>
    <?php
}
