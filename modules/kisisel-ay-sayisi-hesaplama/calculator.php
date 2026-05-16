<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_ay_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-ay-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-ay-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-ay-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-ay-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-month">
        <h3>Kişisel Ay Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pm-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-pm-birth" class="hc-input">
        </div>
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-pm-month">Hesaplanacak Ay:</label>
                <select id="hc-pm-month" class="hc-input">
                    <option value="1">Ocak</option>
                    <option value="2">Şubat</option>
                    <option value="3">Mart</option>
                    <option value="4">Nisan</option>
                    <option value="5">Mayıs</option>
                    <option value="6">Haziran</option>
                    <option value="7">Temmuz</option>
                    <option value="8">Ağustos</option>
                    <option value="9">Eylül</option>
                    <option value="10">Ekim</option>
                    <option value="11">Kasım</option>
                    <option value="12">Aralık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-year">Hesaplanacak Yıl:</label>
                <input type="number" id="hc-pm-year" class="hc-input" value="2026">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKisiselAyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kisisel-ay-sayisi-hesaplama-result">
            <div class="hc-result-label">Kişisel Ay Sayınız:</div>
            <div class="hc-result-value" id="hc-res-pm-val">-</div>
            <div id="hc-res-pm-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
