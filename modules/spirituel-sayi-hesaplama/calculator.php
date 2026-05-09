<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spirituel_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spirit-calc',
        HC_PLUGIN_URL . 'modules/spirituel-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spirit-calc-css',
        HC_PLUGIN_URL . 'modules/spirituel-sayi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spirituel-sayi-hesaplama">
        <h3>Spiritüel Sayı Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-spirit-name">Tam Adınız</label>
            <input type="text" id="hc-spirit-name" placeholder="Adınız ve Soyadınız">
        </div>
        <div class="hc-form-group">
            <label for="hc-spirit-date">Doğum Tarihi</label>
            <input type="date" id="hc-spirit-date">
        </div>
        <button class="hc-btn" onclick="hcSpirituelBul()">Ruhsal Titreşimini Bul</button>
        <div class="hc-result" id="hc-spirit-result">
            <div class="hc-result-label">Spiritüel Sayınız:</div>
            <div class="hc-result-value" id="hc-spirit-val"></div>
            <div class="hc-result-desc" id="hc-spirit-desc"></div>
        </div>
    </div>
    <?php
}
