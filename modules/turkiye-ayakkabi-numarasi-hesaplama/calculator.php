<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_turkiye_ayakkabi_numarasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shoe-size',
        HC_PLUGIN_URL . 'modules/turkiye-ayakkabi-numarasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shoe-size-css',
        HC_PLUGIN_URL . 'modules/turkiye-ayakkabi-numarasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shoe-size">
        <h3>Ayakkabı Numarası Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-foot-cm">Ayak Uzunluğu (cm)</label>
            <input type="number" id="hc-foot-cm" placeholder="Örn: 26.5" step="0.1" min="10">
        </div>
        <button class="hc-btn" onclick="hcShoeSizeHesapla()">Numarayı Bul</button>
        <div class="hc-result" id="hc-shoe-size-result">
            <div class="hc-result-item">
                <span>TR/EU Numaranız:</span>
                <span class="hc-result-value" id="hc-res-shoe-num">0</span>
            </div>
            <div class="hc-shoe-others">
                <p>US Erkek: <b id="hc-res-shoe-us-m">0</b></p>
                <p>UK: <b id="hc-res-shoe-uk">0</b></p>
            </div>
        </div>
    </div>
    <?php
}
