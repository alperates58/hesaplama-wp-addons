<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_ruh_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-soul',
        HC_PLUGIN_URL . 'modules/tarot-ruh-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-soul-calc">
        <h3>Tarot Ruh Kartı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-trc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcTarotRuhHesapla()">Ruh Kartımı Bul</button>
        <div class="hc-result" id="hc-tarot-ruh-karti-result">
            <div class="hc-result-header">Sizin Ruh Kartınız: <span id="hc-trc-value" class="hc-result-value"></span></div>
            <div id="hc-trc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
