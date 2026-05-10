<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_apartman_aidati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-apartman-aidati-hesaplama',
        HC_PLUGIN_URL . 'modules/apartman-aidati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-apartman-aidati-hesaplama-css',
        HC_PLUGIN_URL . 'modules/apartman-aidati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dues">
        <h3>Apartman Aidatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ad-total">Toplam Aylık Gider (₺)</label>
            <input type="number" id="hc-ad-total" placeholder="Personel, elektrik, su vb.">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-units">Toplam Daire Sayısı</label>
            <input type="number" id="hc-ad-units" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-reserve">Yedek Akçe / Fon Payı (%)</label>
            <input type="number" id="hc-ad-reserve" value="10">
        </div>
        <button class="hc-btn" onclick="hcApartmanAidatıHesapla()">Aidatı Hesapla</button>
        <div class="hc-result" id="hc-ad-result">
            <div class="hc-result-label">Daire Başı Aidat:</div>
            <div class="hc-result-value" id="hc-ad-val">-</div>
        </div>
    </div>
    <?php
}
