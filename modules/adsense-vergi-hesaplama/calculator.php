<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adsense_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-adsense-vergi-hesaplama',
        HC_PLUGIN_URL . 'modules/adsense-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-adsense-vergi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/adsense-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-adsense-vergi-hesaplama">
        <h3>Adsense Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ads-income">Yıllık Adsense Geliri (TL)</label>
            <input type="number" id="hc-ads-income" placeholder="Örn: 100000">
            <small>Web sitesi veya mobil uygulama reklamlarından gelen brüt tutar.</small>
        </div>
        
        <button class="hc-btn" onclick="hcAdsenseVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-adsense-result">
            <div class="hc-result-item">
                <span>İstisna Durumu:</span>
                <strong id="hc-ads-status">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Kesintisi (%15):</span>
                <strong id="hc-ads-stopaj">-</strong>
            </div>
            <div class="hc-result-item" id="hc-ads-extra-tax-row" style="display:none;">
                <span>Ek Tahakkuk:</span>
                <strong id="hc-ads-extra-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ads-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kalan Kazanç</p>
        </div>
    </div>
    <?php
}
