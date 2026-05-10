<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egim',
        HC_PLUGIN_URL . 'modules/egim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-egim-css',
        HC_PLUGIN_URL . 'modules/egim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-egim">
        <h3>Eğim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eg-rise">Dikey Yükseklik (m):</label>
            <input type="number" id="hc-eg-rise" step="0.01" placeholder="örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-eg-run">Yatay Mesafe (m):</label>
            <input type="number" id="hc-eg-run" step="0.01" placeholder="örn: 100">
        </div>
        <button class="hc-btn" onclick="hcEgimHesapla()">Eğimi Hesapla</button>
        <div class="hc-result" id="hc-egim-result">
            <strong>Hesaplanan Eğim (m):</strong>
            <div id="hc-eg-res-val" class="hc-result-value">-</div>
            <p id="hc-eg-res-deg" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
