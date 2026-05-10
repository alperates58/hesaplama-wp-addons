<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_yakin_yuzde_birlige_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-round-2',
        HC_PLUGIN_URL . 'modules/en-yakin-yuzde-birlige-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-round-2-css',
        HC_PLUGIN_URL . 'modules/en-yakin-yuzde-birlige-yuvarlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-round-2">
        <h3>En Yakın Yüzde Birliğe Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-r2-num">Sayı:</label>
            <input type="number" id="hc-r2-num" step="0.001" placeholder="örn: 12.345">
        </div>
        <button class="hc-btn" onclick="hcRound2Hesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-round-2-result">
            <strong>Sonuç:</strong>
            <div id="hc-r2-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
