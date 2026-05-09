<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yil-hesaplama',
        HC_PLUGIN_URL . 'modules/yil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yil-calc">
        <h3>Yıl Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gün Sayısı</label>
            <input type="number" id="hc-y-days" value="730">
        </div>
        <button class="hc-btn" onclick="hcYilHesapla()">Yıla Çevir</button>
        <div class="hc-result" id="hc-y-result">
            <div class="hc-result-title">Sonuç:</div>
            <div class="hc-result-value" id="hc-y-val">-</div>
        </div>
    </div>
    <?php
}
