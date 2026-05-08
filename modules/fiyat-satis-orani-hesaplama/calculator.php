<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiyat_satis_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ps-ratio',
        HC_PLUGIN_URL . 'modules/fiyat-satis-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ps-ratio-css',
        HC_PLUGIN_URL . 'modules/fiyat-satis-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ps-ratio">
        <h3>Fiyat Satış Oranı (P/S) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ps-mcap">Piyasa Değeri (TL)</label>
            <input type="number" id="hc-ps-mcap" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-revenue">Yıllık Net Satışlar (Ciro) (TL)</label>
            <input type="number" id="hc-ps-revenue">
        </div>
        
        <button class="hc-btn" onclick="hcPSHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ps-ratio-result">
            <div class="hc-result-value" id="hc-ps-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Fiyat Satış Oranı (P/S)</p>
        </div>
    </div>
    <?php
}
