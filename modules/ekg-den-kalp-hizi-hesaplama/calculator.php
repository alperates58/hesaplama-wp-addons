<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekg_den_kalp_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekg-den-kalp-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/ekg-den-kalp-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekg-den-kalp-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ekg-den-kalp-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekg-hr">
        <h3>EKG'den Kalp Hızı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ekg-squares">R-R Arasındaki Küçük Kare Sayısı</label>
            <input type="number" id="hc-ekg-squares" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcEKGKalpHızıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ekg-result">
            <div class="hc-result-label">Kalp Hızı:</div>
            <div class="hc-result-value" id="hc-ekg-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Formül: 1500 / Küçük Kare Sayısı</p>
        </div>
    </div>
    <?php
}
