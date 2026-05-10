<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayakta_calisma_masasi_yuksekligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ayakta-calisma-masasi-yuksekligi-hesaplama',
        HC_PLUGIN_URL . 'modules/ayakta-calisma-masasi-yuksekligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ayakta-calisma-masasi-yuksekligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ayakta-calisma-masasi-yuksekligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-standing-desk">
        <h3>Ayakta Masa Yüksekliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sd-height">Boyunuz (cm)</label>
            <input type="number" id="hc-sd-height" placeholder="Örn: 180">
        </div>
        <button class="hc-btn" onclick="hcAyaktaÇalışmaMasasıYüksekliğiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sd-result">
            <div class="hc-result-label">İdeal Masa Yüksekliği:</div>
            <div class="hc-result-value" id="hc-sd-val">-</div>
            <p id="hc-sd-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
