<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kariyer_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-career',
        HC_PLUGIN_URL . 'modules/kariyer-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-career-calc">
        <h3>Kariyer Tarot Kartı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-ctc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKariyerTarotHesapla()">Kariyer Kartımı Bul</button>
        <div class="hc-result" id="hc-kariyer-tarot-karti-result">
            <div class="hc-result-header">İş Hayatındaki Arketipleriniz: <span id="hc-ctc-value" class="hc-result-value"></span></div>
            <div id="hc-ctc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
