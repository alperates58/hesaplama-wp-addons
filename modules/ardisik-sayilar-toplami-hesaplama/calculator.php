<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ardisik_sayilar_toplami_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seq-sum',
        HC_PLUGIN_URL . 'modules/ardisik-sayilar-toplami-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seq-sum-css',
        HC_PLUGIN_URL . 'modules/ardisik-sayilar-toplami-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seq-sum">
        <h3>Ardışık Sayılar Toplamı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ss-start">İlk Terim (a₁)</label>
            <input type="number" id="hc-ss-start" value="1" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-end">Son Terim (aₙ)</label>
            <input type="number" id="hc-ss-end" placeholder="Örn: 100" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-inc">Artış Miktarı (d)</label>
            <input type="number" id="hc-ss-inc" value="1" step="1">
        </div>

        <button class="hc-btn" onclick="hcArdisikToplamHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-item">
                <span>Terim Sayısı (n):</span>
                <span class="hc-result-value" id="hc-res-ss-n">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam:</span>
                <span class="hc-result-value highlight" id="hc-res-ss-sum">-</span>
            </div>
        </div>
    </div>
    <?php
}
