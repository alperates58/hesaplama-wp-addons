<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_ondaliga_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-1',
        HC_PLUGIN_URL . 'modules/en-yakin-ondaliga-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-1-css',
        HC_PLUGIN_URL . 'modules/en-yakin-ondaliga-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-1">
        <h3>En Yakın Ondalığa Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r1-num">Sayı:</label>
            <input type="number" id="hc-r1-num" step="0.01" placeholder="örn: 12.345">
        </div>
        <button class="hc-btn" onclick="hcRound1Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-1-result">
            <strong>Sonuç:</strong>
            <div id="hc-r1-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
