<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surdurulebilirlik_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surdurulebilirlik-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/surdurulebilirlik-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surdurulebilirlik-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surdurulebilirlik-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sustain-score">
        <h3>Sürdürülebilirlik Skoru</h3>
        <div class="hc-form-group">
            <label>Kategoriler</label>
            <div class="hc-check-list">
                <label><input type="checkbox" class="hc-ss-point" value="20"> Yenilenebilir enerji kullanıyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="15"> Yerel ve mevsimsel gıdayla besleniyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="15"> Toplu taşıma veya bisiklet tercih ediyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="15"> Hızlı moda (fast fashion) ürünlerinden kaçınıyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="15"> Atıklarımı ayrıştırıyor ve geri dönüştürüyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="10"> Enerji tasarruflu cihazlar kullanıyorum</label>
                <label><input type="checkbox" class="hc-ss-point" value="10"> Su tasarruf aparatları kullanıyorum</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcSürdürülebilirlikSkoruHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-label">Sürdürülebilirlik Skoru:</div>
            <div class="hc-result-value" id="hc-ss-val">-</div>
            <p id="hc-ss-status" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
