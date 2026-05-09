<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ahsap_kiris_acikligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ahsap-kiris-acikligi-hesaplama',
        HC_PLUGIN_URL . 'modules/ahsap-kiris-acikligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ahsap-kiris-acikligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ahsap-kiris-acikligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ahsap-kiris-acikligi-hesaplama">
        <h3>Güvenli Kiriş Açıklığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aka-width">Kiriş Genişliği (cm)</label>
            <input type="number" id="hc-aka-width" placeholder="Örn: 5" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-aka-height">Kiriş Yüksekliği (cm)</label>
            <input type="number" id="hc-aka-height" placeholder="Örn: 15" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-aka-spacing">Kirişler Arası Mesafe (cm)</label>
            <input type="number" id="hc-aka-spacing" placeholder="Örn: 40" value="40">
        </div>
        <button class="hc-btn" onclick="hcAKAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aka-result">
            <div class="hc-result-label">Tahmini Maksimum Açıklık:</div>
            <div class="hc-result-value" id="hc-aka-val">-</div>
            <div class="hc-result-note">L/360 sehim sınırı ve standart yumuşak ağaç (çam vb.) değerleri baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
