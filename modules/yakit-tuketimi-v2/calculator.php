<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_tuketimi_v2( $atts ) {
    wp_enqueue_script(
        'hc-fuel-cons-v2',
        HC_PLUGIN_URL . 'modules/yakit-tuketimi-v2/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fcv2-box">
        <h3>Yakıt Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gidilen Yol (km)</label>
            <input type="number" id="hc-fcv2-km" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label>Alınan Yakıt (Litre)</label>
            <input type="number" id="hc-fcv2-lt" placeholder="Örn: 7.5">
        </div>
        <button class="hc-btn" onclick="hcFcv2Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fcv2-result">
            <div class="hc-result-title">Ortalama Tüketim:</div>
            <div class="hc-result-value" id="hc-fcv2-val">-</div>
        </div>
    </div>
    <?php
}
