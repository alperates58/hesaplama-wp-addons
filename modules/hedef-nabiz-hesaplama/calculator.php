<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-target',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-target-css',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-target">
        <h3>Hedef Antrenman Nabzı</h3>
        <div class="hc-form-group">
            <label for="hc-ht-age">Yaşınız:</label>
            <input type="number" id="hc-ht-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-ht-rest">Dinlenik Nabız (BPM):</label>
            <input type="number" id="hc-ht-rest" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-ht-intensity">Hedef Yoğunluk (%):</label>
            <input type="number" id="hc-ht-intensity" placeholder="75">
            <small>Örn: %70-80 aerobik gelişim içindir.</small>
        </div>
        <button class="hc-btn" onclick="hcHrTargetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-target-result">
            <strong>Hedef Nabız Değeriniz:</strong>
            <div id="hc-ht-res-val" class="hc-result-value">-</div>
            <span>BPM</span>
        </div>
    </div>
    <?php
}
