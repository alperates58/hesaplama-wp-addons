<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuel-cons-calc',
        HC_PLUGIN_URL . 'modules/yakit-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fcc-box">
        <h3>Yakıt Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Kat Edilen Mesafe (km)</label>
            <input type="number" id="hc-fcc-dist" placeholder="Örn: 650">
        </div>
        <div class="hc-form-group">
            <label>Harcanan Yakıt (Litre)</label>
            <input type="number" step="0.1" id="hc-fcc-fuel" placeholder="Örn: 42.5">
        </div>
        <button class="hc-btn" onclick="hcFccHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fcc-result">
            <div class="hc-result-title">Ortalama Tüketim:</div>
            <div class="hc-result-value" id="hc-fcc-val">-</div>
            <div id="hc-fcc-cost" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
