<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ask_uyumu( $atts ) {
    wp_enqueue_script(
        'hc-ask-uyumu',
        HC_PLUGIN_URL . 'modules/ask-uyumu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ask-uyumu-css',
        HC_PLUGIN_URL . 'modules/ask-uyumu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ask-uyumu">
        <h3>Aşk Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-love-name1">Sizin Adınız</label>
            <input type="text" id="hc-love-name1" placeholder="Adınız">
        </div>
        <div class="hc-form-group">
            <label for="hc-love-name2">Partnerinizin Adı</label>
            <input type="text" id="hc-love-name2" placeholder="Partnerinizin Adı">
        </div>
        <button class="hc-btn" onclick="hcAskUyumuHesapla()">Aşk Yüzdesini Bul</button>
        <div class="hc-result" id="hc-ask-uyumu-result">
            <div class="hc-result-label">Aşk Uyumunuz:</div>
            <div class="hc-result-value" id="hc-ask-skor"></div>
            <div class="hc-result-desc" id="hc-ask-desc"></div>
        </div>
    </div>
    <?php
}
