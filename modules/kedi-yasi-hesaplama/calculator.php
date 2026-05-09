<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-yasi',
        HC_PLUGIN_URL . 'modules/kedi-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ky-calc-kedi">
        <h3>Kedi Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Kedi Yaşı</label>
            <input type="number" id="hc-kyk-age" value="3">
        </div>
        <button class="hc-btn" onclick="hcKediYaşıHesapla()">İnsan Yaşına Çevir</button>
        <div class="hc-result" id="hc-kyk-result">
            <div class="hc-result-title">Kedinizin İnsan Yaşı:</div>
            <div class="hc-result-value" id="hc-kyk-val">-</div>
        </div>
    </div>
    <?php
}
