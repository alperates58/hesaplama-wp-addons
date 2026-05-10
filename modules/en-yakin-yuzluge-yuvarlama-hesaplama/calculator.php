<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_yuzluge_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-100',
        HC_PLUGIN_URL . 'modules/en-yakin-yuzluge-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-100-css',
        HC_PLUGIN_URL . 'modules/en-yakin-yuzluge-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-100">
        <h3>En Yakın Yüzlüğe Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r100-num">Sayı:</label>
            <input type="number" id="hc-r100-num" placeholder="örn: 1254">
        </div>
        <button class="hc-btn" onclick="hcRound100Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-100-result">
            <strong>Sonuç:</strong>
            <div id="hc-r100-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
