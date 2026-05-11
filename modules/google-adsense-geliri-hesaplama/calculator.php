<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_google_adsense_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-adsense-geliri',
        HC_PLUGIN_URL . 'modules/google-adsense-geliri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-adsense-geliri-css',
        HC_PLUGIN_URL . 'modules/google-adsense-geliri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-adsense">
        <h3>Google AdSense Geliri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-as-views">Günlük Sayfa Görüntüleme</label>
            <input type="number" id="hc-as-views" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-ctr">Tıklama Oranı (CTR %)</label>
            <input type="number" id="hc-as-ctr" placeholder="Örn: 1.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-cpc">Tıklama Başı Kazanç (CPC ₺)</label>
            <input type="number" id="hc-as-cpc" placeholder="Örn: 0.80" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcAdsenseGeliriHesapla()">Geliri Hesapla</button>
        <div class="hc-result" id="hc-as-result">
            <div class="hc-result-item">
                <span>Günlük Tahmini Gelir:</span>
                <strong id="hc-as-res-daily">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Gelir:</span>
                <strong class="hc-result-value" id="hc-as-res-monthly">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tahmini Gelir:</span>
                <strong id="hc-as-res-yearly">-</strong>
            </div>
        </div>
    </div>
    <?php
}
