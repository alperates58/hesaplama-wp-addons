<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sutyen_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bra-size',
        HC_PLUGIN_URL . 'modules/sutyen-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bra-size-css',
        HC_PLUGIN_URL . 'modules/sutyen-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bra-size">
        <h3>Sütyen Bedeni Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-bra-under">Alt Göğüs Çevresi (cm)</label>
            <input type="number" id="hc-bra-under" placeholder="Örn: 75" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bra-over">Göğüs Çevresi (cm)</label>
            <input type="number" id="hc-bra-over" placeholder="Örn: 90" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBraSizeHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-bra-size-result">
            <div class="hc-result-item">
                <span>Bedeniniz:</span>
                <span class="hc-result-value" id="hc-res-bra-val">-</span>
            </div>
            <p class="hc-bra-info">Doğru ölçüm için mezurayı çok sıkmadan, göğsün en geniş yerinden ölçmelisiniz.</p>
        </div>
    </div>
    <?php
}
