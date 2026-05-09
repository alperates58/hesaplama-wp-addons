<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyolojik_seri_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biyolojik-seri-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/biyolojik-seri-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-biyolojik-seri-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/biyolojik-seri-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biyolojik-seri-seyreltme-hesaplama">
        <h3>Biyolojik Seri Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-start">Başlangıç Konsantrasyonu</label>
            <input type="number" id="hc-ss-start" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-sample">Örnek Hacmi (mL)</label>
            <input type="number" id="hc-ss-sample" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-diluent">Seyreltici Hacmi (mL)</label>
            <input type="number" id="hc-ss-diluent" placeholder="Örn: 9" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-steps">Seyreltme Adım Sayısı</label>
            <input type="number" id="hc-ss-steps" placeholder="Örn: 5" min="1">
        </div>
        <button class="hc-btn" onclick="hcSeriSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-label">Final Konsantrasyonu:</div>
            <div class="hc-result-value" id="hc-ss-val">-</div>
            <div class="hc-result-note" id="hc-ss-note"></div>
        </div>
    </div>
    <?php
}
