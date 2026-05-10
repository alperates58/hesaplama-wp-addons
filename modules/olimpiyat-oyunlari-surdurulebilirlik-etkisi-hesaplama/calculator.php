<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olimpiyat_oyunlari_surdurulebilirlik_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olimpiyat-oyunlari-surdurulebilirlik-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/olimpiyat-oyunlari-surdurulebilirlik-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olimpiyat-oyunlari-surdurulebilirlik-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/olimpiyat-oyunlari-surdurulebilirlik-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olympic">
        <h3>Organizasyon Sürdürülebilirlik Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-ol-fans">Katılımcı / Seyirci Sayısı</label>
            <input type="number" id="hc-ol-fans" value="100000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ol-travel">Ortalama Seyahat Mesafesi (km)</label>
            <input type="number" id="hc-ol-travel" value="2000">
        </div>
        <button class="hc-btn" onclick="hcOlimpiyatOyunlarıSürdürülebilirlikEtkisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ol-result">
            <div id="hc-ol-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
