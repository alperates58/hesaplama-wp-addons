<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_yil_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-year',
        HC_PLUGIN_URL . 'modules/tarot-yil-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-year-calc">
        <h3>Tarot Yıl Kartı (2026 Projeksiyonu)</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-tyc-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcTarotYilHesapla()">Yıl Kartımı Bul</button>
        <div class="hc-result" id="hc-tarot-yil-karti-result">
            <div class="hc-result-header">2026 Yılı Kartınız: <span id="hc-tyc-value" class="hc-result-value"></span></div>
            <div id="hc-tyc-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
