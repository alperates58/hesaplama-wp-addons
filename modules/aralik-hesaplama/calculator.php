<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aralik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-range-calc',
        HC_PLUGIN_URL . 'modules/aralik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-range-calc-css',
        HC_PLUGIN_URL . 'modules/aralik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-range">
        <h3>Aralık (Açıklık) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-r-data">Veri Seti (Virgül ile ayırın)</label>
            <input type="text" id="hc-r-data" placeholder="Örn: 10, 25, 4, 18, 42">
        </div>

        <button class="hc-btn" onclick="hcAralikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-r-result">
            <div class="hc-result-item">
                <span>Aralık (Ranj):</span>
                <span class="hc-result-value highlight" id="hc-res-r-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>En Küçük (Min):</span>
                <span class="hc-result-value" id="hc-res-r-min">-</span>
            </div>
            <div class="hc-result-item">
                <span>En Büyük (Max):</span>
                <span class="hc-result-value" id="hc-res-r-max">-</span>
            </div>
        </div>
    </div>
    <?php
}
