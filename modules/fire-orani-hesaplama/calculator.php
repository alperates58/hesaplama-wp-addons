<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fire_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fire-rate',
        HC_PLUGIN_URL . 'modules/fire-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fire-rate-css',
        HC_PLUGIN_URL . 'modules/fire-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fire-rate">
        <h3>Fire Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fr-total">Toplam Giriş Miktarı:</label>
            <input type="number" id="hc-fr-total" placeholder="örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-waste">Fire Miktarı:</label>
            <input type="number" id="hc-fr-waste" placeholder="örn: 50">
        </div>
        <button class="hc-btn" onclick="hcFireRateHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-fire-rate-result">
            <strong>Fire Oranı:</strong>
            <div id="hc-fr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
