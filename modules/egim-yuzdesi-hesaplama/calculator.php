<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egim_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egim-yuzde',
        HC_PLUGIN_URL . 'modules/egim-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-egim-yuzde-css',
        HC_PLUGIN_URL . 'modules/egim-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-egim-yuzde">
        <h3>Eğim Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ey-rise">Dikey Yükseklik (m):</label>
            <input type="number" id="hc-ey-rise" step="0.01" placeholder="örn: 8">
        </div>
        <div class="hc-form-group">
            <label for="hc-ey-run">Yatay Mesafe (m):</label>
            <input type="number" id="hc-ey-run" step="0.01" placeholder="örn: 100">
        </div>
        <button class="hc-btn" onclick="hcEgimYuzdesiHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-egim-yuzde-result">
            <strong>Eğim Yüzdesi:</strong>
            <div id="hc-ey-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
