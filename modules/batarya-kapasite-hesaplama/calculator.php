<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_batarya_kapasite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-battery-cap',
        HC_PLUGIN_URL . 'modules/batarya-kapasite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-battery-cap-css',
        HC_PLUGIN_URL . 'modules/batarya-kapasite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-battery-cap">
        <h3>Batarya Kapasite Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bc-voltage">Gerilim (Volt - V)</label>
            <input type="number" id="hc-bc-voltage" placeholder="Örn: 12" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-ah">Kapasite (Amper-Saat - Ah)</label>
            <input type="number" id="hc-bc-ah" placeholder="Örn: 100" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcBataryaKapasiteHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-item">
                <span>Toplam Enerji:</span>
                <span class="hc-result-value" id="hc-res-bc-wh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kilowatt-Saat Cinsinden:</span>
                <span class="hc-result-value" id="hc-res-bc-kwh">-</span>
            </div>
        </div>
    </div>
    <?php
}
