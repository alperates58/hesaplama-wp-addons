<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hafta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hafta-hesaplama',
        HC_PLUGIN_URL . 'modules/hafta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hafta-calc">
        <h3>Hafta Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gün Sayısı Girin</label>
            <input type="number" id="hc-h-days" value="30">
        </div>
        <button class="hc-btn" onclick="hcHaftaHesapla()">Haftaya Çevir</button>
        <div class="hc-result" id="hc-h-result">
            <div class="hc-result-title">Sonuç:</div>
            <div class="hc-result-value" id="hc-h-val">-</div>
        </div>
    </div>
    <?php
}
