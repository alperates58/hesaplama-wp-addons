<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hedef-nabiz-hesaplama',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hedef-nabiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hedef-nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-hr">
        <h3>Hedef Nabız Hesaplama (Karvonen)</h3>
        <div class="hc-form-group">
            <label for="hc-thr-age">Yaşınız</label>
            <input type="number" id="hc-thr-age" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-thr-rest">Dinlenik Nabız (bpm)</label>
            <input type="number" id="hc-thr-rest" placeholder="Örn: 65">
        </div>
        <div class="hc-form-group">
            <label for="hc-thr-intensity">Egzersiz Şiddeti (%)</label>
            <input type="number" id="hc-thr-intensity" placeholder="Örn: 70" value="70">
        </div>
        <button class="hc-btn" onclick="hcHedefNabızHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-thr-result">
            <div class="hc-result-label">Hedef Nabız:</div>
            <div class="hc-result-value" id="hc-thr-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Karvonen Formülü: ((Max Nabız - Dinlenik Nabız) * Şiddet) + Dinlenik Nabız</p>
        </div>
    </div>
    <?php
}
