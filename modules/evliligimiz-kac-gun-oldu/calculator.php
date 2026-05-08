<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evliligimiz_kac_gun_oldu( $atts ) {
    wp_enqueue_script(
        'hc-evlilik-hesaplama',
        HC_PLUGIN_URL . 'modules/evliligimiz-kac-gun-oldu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evlilik-hesaplama-wrapper">
        <h3>Evliliğimiz Kaç Gün Oldu?</h3>
        <div class="hc-form-group">
            <label>Evlilik Tarihi</label>
            <input type="date" id="hc-ev-date">
        </div>
        <button class="hc-btn" onclick="hcEvlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ev-result">
            <div class="hc-form-group">
                <label>Birlikte Geçen Süre:</label>
                <div class="hc-result-value" id="hc-ev-val" style="font-size: 24px;">-</div>
            </div>
            <div id="hc-ev-details" style="font-size: 14px; margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
