<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yag_yakim_nabiz_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yag-yakim-nabiz-araligi-hesaplama',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yag-yakim-nabiz-araligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fat-burn">
        <h3>Yağ Yakım Nabız Aralığı</h3>
        <div class="hc-form-group">
            <label for="hc-fb-age">Yaşınız</label>
            <input type="number" id="hc-fb-age" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcYağYakımNabızAralığıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fb-result">
            <div class="hc-result-label">İdeal Aralık (%60-70 MHR):</div>
            <div class="hc-result-value" id="hc-fb-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Yağ yakımı için nabzınızın bu aralıkta kalması önerilir.</p>
        </div>
    </div>
    <?php
}
