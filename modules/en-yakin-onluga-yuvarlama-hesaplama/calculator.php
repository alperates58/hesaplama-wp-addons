<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_onluga_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-10',
        HC_PLUGIN_URL . 'modules/en-yakin-onluga-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-10-css',
        HC_PLUGIN_URL . 'modules/en-yakin-onluga-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-10">
        <h3>En Yakın Onluğa Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r10-num">Sayı:</label>
            <input type="number" id="hc-r10-num" placeholder="örn: 124">
        </div>
        <button class="hc-btn" onclick="hcRound10Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-10-result">
            <strong>Sonuç:</strong>
            <div id="hc-r10-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
