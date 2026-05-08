<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiyat_nakit_akisi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pcf-ratio',
        HC_PLUGIN_URL . 'modules/fiyat-nakit-akisi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pcf-ratio-css',
        HC_PLUGIN_URL . 'modules/fiyat-nakit-akisi-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pcf-ratio">
        <h3>Fiyat Nakit Akışı Oranı (P/CF) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pcf-mcap">Piyasa Değeri (TL)</label>
            <input type="number" id="hc-pcf-mcap" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-pcf-cashflow">Operasyonel Nakit Akışı (TL)</label>
            <input type="number" id="hc-pcf-cashflow" placeholder="Nakit Akım Tablosu">
        </div>
        
        <button class="hc-btn" onclick="hcPCFHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pcf-ratio-result">
            <div class="hc-result-value" id="hc-pcf-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Fiyat Nakit Akışı Oranı (P/CF)</p>
        </div>
    </div>
    <?php
}
