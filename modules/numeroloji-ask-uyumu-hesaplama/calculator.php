<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-numeroloji-ask-uyumu-hesaplama',
        HC_PLUGIN_URL . 'modules/numeroloji-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-numeroloji-ask-uyumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/numeroloji-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-num-love">
        <h3>Numeroloji Aşk Uyumu Hesaplama</h3>
        <div class="hc-num-grid">
            <div class="hc-num-col">
                <label>1. Kişi Doğum Tarihi:</label>
                <input type="date" id="hc-nl-birth-1" class="hc-input">
            </div>
            <div class="hc-num-col">
                <label>2. Kişi Doğum Tarihi:</label>
                <input type="date" id="hc-nl-birth-2" class="hc-input">
            </div>
        </div>
        <button class="hc-btn" onclick="hcNumerologyLoveHesapla()">Uyumu Hesapla</button>
        <div class="hc-result" id="hc-numeroloji-ask-uyumu-hesaplama-result">
            <div class="hc-result-label">Aşk Uyumu Puanı:</div>
            <div class="hc-result-value" id="hc-res-nl-val">-</div>
            <div id="hc-res-nl-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
