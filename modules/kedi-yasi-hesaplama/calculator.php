<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-yasi',
        HC_PLUGIN_URL . 'modules/kedi-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kedi-yasi-css',
        HC_PLUGIN_URL . 'modules/kedi-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kedi-yasi">
        <h3>Kedi Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ky-age">Kedi Yaşı (Yıl):</label>
            <input type="number" id="hc-ky-age" min="0" max="30" step="1" placeholder="3">
        </div>
        <button class="hc-btn" onclick="hcKediYasiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kedi-yasi-result">
            <strong>İnsan Yaşı Karşılığı:</strong>
            <div id="hc-ky-res-val" class="hc-result-value">-</div>
            <div id="hc-ky-res-stage" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
