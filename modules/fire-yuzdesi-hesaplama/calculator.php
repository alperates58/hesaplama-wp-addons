<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fire_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fire-pct',
        HC_PLUGIN_URL . 'modules/fire-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fire-pct-css',
        HC_PLUGIN_URL . 'modules/fire-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fire-pct">
        <h3>Fire Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fp-total">Toplam Giriş Miktarı:</label>
            <input type="number" id="hc-fp-total" placeholder="örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-fp-waste">Fire Miktarı:</label>
            <input type="number" id="hc-fp-waste" placeholder="örn: 25">
        </div>
        <button class="hc-btn" onclick="hcFirePctHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-fire-pct-result">
            <strong>Fire Yüzdesi:</strong>
            <div id="hc-fp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
