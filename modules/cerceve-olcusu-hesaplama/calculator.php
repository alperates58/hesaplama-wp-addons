<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cerceve_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cerceve-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/cerceve-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cerceve-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cerceve-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frame">
        <h3>Çerçeve Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fr-w">Fotoğraf Genişliği (cm)</label>
            <input type="number" id="hc-fr-w" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-h">Fotoğraf Yüksekliği (cm)</label>
            <input type="number" id="hc-fr-h" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-mat">Paspartu Genişliği (cm - Her bir kenar için)</label>
            <input type="number" id="hc-fr-mat" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-border">Çerçeve Çıtası Genişliği (cm)</label>
            <input type="number" id="hc-fr-border" value="2">
        </div>
        <button class="hc-btn" onclick="hcÇerçeveÖlçüsüHesapla()">Dış Ölçüyü Hesapla</button>
        <div class="hc-result" id="hc-fr-result">
            <div class="hc-result-label">Toplam Dış Ölçü:</div>
            <div class="hc-result-value" id="hc-fr-val">-</div>
        </div>
    </div>
    <?php
}
