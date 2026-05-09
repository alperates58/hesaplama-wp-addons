<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sifre_kombinasyon_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pass-comb',
        HC_PLUGIN_URL . 'modules/sifre-kombinasyon-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pass-comb-css',
        HC_PLUGIN_URL . 'modules/sifre-kombinasyon-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pass-comb">
        <h3>Şifre Kombinasyon Sayısı</h3>
        <div class="hc-form-group">
            <label for="hc-pc-len">Şifre Uzunluğu</label>
            <input type="number" id="hc-pc-len" value="8" min="1" max="50">
        </div>
        <div class="hc-form-group">
            <label>Karakter Seti</label>
            <div class="hc-pc-checks">
                <label><input type="checkbox" id="hc-pc-num" checked> Rakamlar (10)</label>
                <label><input type="checkbox" id="hc-pc-lower" checked> Küçük Harf (26)</label>
                <label><input type="checkbox" id="hc-pc-upper"> Büyük Harf (26)</label>
                <label><input type="checkbox" id="hc-pc-sym"> Semboller (32)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPassCombHesapla()">Kombinasyon Sayısını Gör</button>
        <div class="hc-result" id="hc-pass-comb-result">
            <div class="hc-result-item">
                <span>Toplam Kombinasyon:</span>
                <span class="hc-result-value" id="hc-res-pc-val">0</span>
            </div>
            <p class="hc-pc-note">Formül: Karakter Sayısı ^ Şifre Uzunluğu</p>
        </div>
    </div>
    <?php
}
