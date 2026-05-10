<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vki_sonucu_yorumlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki-interpret',
        HC_PLUGIN_URL . 'modules/vki-sonucu-yorumlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-interpret-css',
        HC_PLUGIN_URL . 'modules/vki-sonucu-yorumlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki-interpret">
        <h3>VKİ Analiz ve Yorumlama</h3>
        <div class="hc-form-group">
            <label for="hc-vi-val">VKİ Değeriniz:</label>
            <input type="number" id="hc-vi-val" placeholder="24.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcVkiInterpretHesapla()">Yorumla</button>
        <div class="hc-result" id="hc-vki-interpret-result">
            <div id="hc-vi-res-title" style="font-weight:bold; font-size:1.2rem; margin-bottom:10px;"></div>
            <div id="hc-vi-res-desc"></div>
        </div>
    </div>
    <?php
}
