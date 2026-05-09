<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_turbini_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wind-energy',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wind-energy-css',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wind-energy">
        <h3>Rüzgar Türbini Enerji Üretimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-we-power">Türbin Kurulu Gücü (MW)</label>
            <input type="number" id="hc-we-power" placeholder="Örn: 3.5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-we-cf">Kapasite Faktörü (%)</label>
            <input type="number" id="hc-we-cf" value="35" step="1">
            <small>Türkiye ortalaması %30-%40 civarıdır.</small>
        </div>

        <button class="hc-btn" onclick="hcRuzgarEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-we-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Üretim:</span>
                <span class="hc-result-value highlight" id="hc-res-we-mwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Beslenen Hane Sayısı:</span>
                <span class="hc-result-value" id="hc-res-we-homes">-</span>
            </div>
            <div class="hc-result-note">
                * Hane başı yıllık tüketim 3.500 kWh baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
