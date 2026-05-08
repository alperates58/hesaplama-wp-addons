<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kur_deger_artisi_azalisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rate-change',
        HC_PLUGIN_URL . 'modules/kur-deger-artisi-azalisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rate-change-css',
        HC_PLUGIN_URL . 'modules/kur-deger-artisi-azalisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rate-change">
        <h3>Kur Değer Değişimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rc-start">Eski Kur (TL)</label>
            <input type="number" id="hc-rc-start" step="0.0001">
        </div>

        <div class="hc-form-group">
            <label for="hc-rc-end">Yeni Kur (TL)</label>
            <input type="number" id="hc-rc-end" step="0.0001">
        </div>
        
        <button class="hc-btn" onclick="hcRateChangeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rate-change-result">
            <div class="hc-result-value" id="hc-rc-res-val">
                -
            </div>
            <p id="hc-rc-text" style="text-align:center; font-weight: bold; margin-top: 10px;"></p>
        </div>
    </div>
    <?php
}
