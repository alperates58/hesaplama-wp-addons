<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-birth',
        HC_PLUGIN_URL . 'modules/dogum-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-birth-calc">
        <h3>Doğum Tarot Kartı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-tbc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcDogumTarotHesapla()">Kartımı Bul</button>
        <div class="hc-result" id="hc-dogum-tarot-karti-result">
            <div class="hc-result-header">Sizin Doğum Kartınız: <span id="hc-tbc-value" class="hc-result-value"></span></div>
            <div id="hc-tbc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
