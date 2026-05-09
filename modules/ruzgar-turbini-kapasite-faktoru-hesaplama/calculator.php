<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_turbini_kapasite_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wind-cf',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-kapasite-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wind-cf-css',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-kapasite-faktoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wind-cf">
        <h3>Türbin Kapasite Faktörü</h3>
        
        <div class="hc-form-group">
            <label for="hc-cf-actual">Gerçek Üretim (MWh)</label>
            <input type="number" id="hc-cf-actual" placeholder="Örn: 10000" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-cf-power">Türbin Kurulu Gücü (MW)</label>
            <input type="number" id="hc-cf-power" placeholder="Örn: 4" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-cf-period">Dönem Süresi (Gün)</label>
            <input type="number" id="hc-cf-period" value="365" step="1">
        </div>

        <button class="hc-btn" onclick="hcCfHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cf-result">
            <div class="hc-result-item">
                <span>Teorik Maksimum Üretim:</span>
                <span class="hc-result-value" id="hc-res-cf-max">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kapasite Faktörü:</span>
                <span class="hc-result-value highlight" id="hc-res-cf-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
