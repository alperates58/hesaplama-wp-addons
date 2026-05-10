<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_binde_birlige_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-3',
        HC_PLUGIN_URL . 'modules/en-yakin-binde-birlige-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-3-css',
        HC_PLUGIN_URL . 'modules/en-yakin-binde-birlige-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-3">
        <h3>En Yakın Binde Birliğe Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r3-num">Sayı:</label>
            <input type="number" id="hc-r3-num" step="0.0001" placeholder="örn: 12.34567">
        </div>
        <button class="hc-btn" onclick="hcRound3Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-3-result">
            <strong>Sonuç:</strong>
            <div id="hc-r3-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
