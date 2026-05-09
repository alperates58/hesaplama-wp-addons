<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigma_seviyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-six-sigma',
        HC_PLUGIN_URL . 'modules/sigma-seviyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-six-sigma-css',
        HC_PLUGIN_URL . 'modules/sigma-seviyesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-six-sigma">
        <h3>Six Sigma Kalite Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-ss-def">Hatalı Ürün Sayısı (Defects)</label>
            <input type="number" id="hc-ss-def" value="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-opp">Fırsat Sayısı (Opportunities per Unit)</label>
            <input type="number" id="hc-ss-opp" value="1">
            <small>Ürün başına kontrol edilen hata noktası sayısı.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-total">Toplam İncelenen Ürün Sayısı</label>
            <input type="number" id="hc-ss-total" value="1000000">
        </div>
        <button class="hc-btn" onclick="hcSixSigmaHesapla()">Sigma Seviyesini Hesapla</button>
        <div class="hc-result" id="hc-six-sigma-result">
            <div class="hc-result-item">
                <span>DPMO (Milyonda Hata):</span>
                <span id="hc-res-ss-dpmo">0</span>
            </div>
            <div class="hc-result-item">
                <span>Sigma Seviyesi:</span>
                <span class="hc-result-value" id="hc-res-ss-val">0</span>
            </div>
            <p class="hc-ss-note">Not: 1.5 sigma kayması (shift) dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
