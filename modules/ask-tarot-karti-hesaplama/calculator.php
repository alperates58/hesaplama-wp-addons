<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ask_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-love',
        HC_PLUGIN_URL . 'modules/ask-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-love-calc">
        <h3>Aşk Tarot Kartı Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Kişinin Doğum Tarihi</label>
            <input type="date" id="hc-atc-date1" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label>2. Kişinin Doğum Tarihi</label>
            <input type="date" id="hc-atc-date2" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcAskTarotHesapla()">İlişki Kartını Gör</button>
        <div class="hc-result" id="hc-ask-tarot-karti-result">
            <div class="hc-result-header">İlişki Enerjiniz: <span id="hc-atc-value" class="hc-result-value"></span></div>
            <div id="hc-atc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
