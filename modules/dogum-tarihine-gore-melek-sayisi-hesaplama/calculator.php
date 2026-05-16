<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_melek_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-angel-birth',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-melek-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-angel-birth-calc">
        <h3>Kişisel Melek Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-abd-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcDogumMelekSayisiHesapla()">Melek Sayımı Bul</button>
        <div class="hc-result" id="hc-dogum-tarihine-gore-melek-sayisi-result">
            <div class="hc-result-header">Sizin Melek Sayınız: <span id="hc-abd-value" class="hc-result-value"></span></div>
            <div id="hc-abd-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
