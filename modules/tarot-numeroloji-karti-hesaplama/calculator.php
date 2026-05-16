<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_numeroloji_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-num',
        HC_PLUGIN_URL . 'modules/tarot-numeroloji-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-num-calc">
        <h3>Tarot Numeroloji Kartı</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-tnc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcTarotNumHesapla()">Numeroloji Kartımı Bul</button>
        <div class="hc-result" id="hc-tarot-numeroloji-karti-result">
            <div class="hc-result-header">Sizin Numeroloji Kartınız: <span id="hc-tnc-value" class="hc-result-value"></span></div>
            <div id="hc-tnc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
