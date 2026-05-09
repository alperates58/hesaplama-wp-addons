<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_kaplama_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cati-kaplama-metrekare-hesaplama',
        HC_PLUGIN_URL . 'modules/cati-kaplama-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cati-kaplama-metrekare-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cati-kaplama-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cati-kaplama-metrekare-hesaplama">
        <h3>Çatı Yüzey Alanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ckmet-area">Bina Taban Alanı (m²)</label>
            <input type="number" id="hc-ckmet-area" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ckmet-pitch">Çatı Eğimi (%)</label>
            <input type="number" id="hc-ckmet-pitch" placeholder="Örn: 33" value="33">
        </div>
        <button class="hc-btn" onclick="hcCKMetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ckmet-result">
            <div class="hc-result-label">Gerçek Çatı Yüzey Alanı:</div>
            <div class="hc-result-value" id="hc-ckmet-val">-</div>
            <div class="hc-result-note">Eğimli yüzey alanı = Taban Alanı / cos(Eğim Açısı)</div>
        </div>
    </div>
    <?php
}
