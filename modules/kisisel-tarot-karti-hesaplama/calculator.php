<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-daily',
        HC_PLUGIN_URL . 'modules/kisisel-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-daily-calc">
        <h3>Günlük Kişisel Tarot Kartı</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-ktc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKisiselTarotHesapla()">Bugünkü Kartımı Gör</button>
        <div class="hc-result" id="hc-kisisel-tarot-karti-result">
            <div class="hc-result-header">Bugünkü Rehber Kartınız: <span id="hc-ktc-value" class="hc-result-value"></span></div>
            <div id="hc-ktc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
