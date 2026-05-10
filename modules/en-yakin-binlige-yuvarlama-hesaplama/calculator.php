<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_binlige_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-1000',
        HC_PLUGIN_URL . 'modules/en-yakin-binlige-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-1000-css',
        HC_PLUGIN_URL . 'modules/en-yakin-binlige-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-1000">
        <h3>En Yakın Binliğe Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r1000-num">Sayı:</label>
            <input type="number" id="hc-r1000-num" placeholder="örn: 12500">
        </div>
        <button class="hc-btn" onclick="hcRound1000Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-1000-result">
            <strong>Sonuç:</strong>
            <div id="hc-r1000-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
