<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_google_ads_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-google-ads-maliyet',
        HC_PLUGIN_URL . 'modules/google-ads-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-google-ads-maliyet-css',
        HC_PLUGIN_URL . 'modules/google-ads-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-google-ads-maliyet">
        <h3>Google Ads Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gam-clicks">Hedef Tıklama Sayısı</label>
            <input type="number" id="hc-gam-clicks" placeholder="Örn: 1.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gam-cpc">Tıklama Başı Maliyet (CPC ₺)</label>
            <input type="number" id="hc-gam-cpc" placeholder="Örn: 5.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-gam-tax">Vergi Dahil mi? (%20 KDV)</label>
            <select id="hc-gam-tax">
                <option value="1">Hayır (Sadece Reklam Harcaması)</option>
                <option value="1.20">Evet (KDV Dahil Toplam Maliyet)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGoogleAdsMaliyetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gam-result">
            <div class="hc-result-item">
                <span>Net Reklam Harcaması:</span>
                <strong id="hc-gam-res-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Tahmini Maliyet:</span>
                <strong class="hc-result-value" id="hc-gam-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
