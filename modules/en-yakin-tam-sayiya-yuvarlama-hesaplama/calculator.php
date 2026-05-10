<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_tam_sayiya_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-int',
        HC_PLUGIN_URL . 'modules/en-yakin-tam-sayiya-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-int-css',
        HC_PLUGIN_URL . 'modules/en-yakin-tam-sayiya-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-int">
        <h3>En Yakın Tam Sayıya Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-ri-num">Sayı:</label>
            <input type="number" id="hc-ri-num" step="0.001" placeholder="örn: 12.7">
        </div>
        <button class="hc-btn" onclick="hcRoundIntHesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-int-result">
            <strong>Sonuç:</strong>
            <div id="hc-ri-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
