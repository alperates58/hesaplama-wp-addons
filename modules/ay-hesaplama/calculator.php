<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ay-calc">
        <h3>Ay Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gün Sayısı</label>
            <input type="number" id="hc-a-days" value="90">
        </div>
        <button class="hc-btn" onclick="hcAyHesapla()">Aya Çevir</button>
        <div class="hc-result" id="hc-a-result">
            <div class="hc-result-title">Sonuç:</div>
            <div class="hc-result-value" id="hc-a-val">-</div>
        </div>
    </div>
    <?php
}
