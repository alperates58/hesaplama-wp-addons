<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kitap_ve_e_kitap_cevresel_etki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kitap-ve-e-kitap-cevresel-etki-hesaplama',
        HC_PLUGIN_URL . 'modules/kitap-ve-e-kitap-cevresel-etki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kitap-ve-e-kitap-cevresel-etki-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kitap-ve-e-kitap-cevresel-etki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-book-vs-ebook">
        <h3>Kitap vs E-Kitap Çevresel Etki</h3>
        <div class="hc-form-group">
            <label for="hc-be-books">Yıllık Okunan Kitap Sayısı</label>
            <input type="number" id="hc-be-books" value="12">
        </div>
        <button class="hc-btn" onclick="hcKitapVeEKitapÇevreselEtkiHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-be-result">
            <div id="hc-be-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
