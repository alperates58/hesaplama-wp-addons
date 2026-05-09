<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ups_kapasite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ups-capacity',
        HC_PLUGIN_URL . 'modules/ups-kapasite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ups-capacity-css',
        HC_PLUGIN_URL . 'modules/ups-kapasite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ups-capacity">
        <h3>UPS Kapasite Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-ups-watts">Toplam Güç Tüketimi [Watt]</label>
            <input type="number" id="hc-ups-watts" value="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-ups-pf">Güç Faktörü (PF)</label>
            <input type="number" id="hc-ups-pf" value="0.8" step="0.1" max="1">
            <small>Genelde 0.6 - 0.9 arasıdır.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ups-margin">Yedek Kapasite (%)</label>
            <input type="number" id="hc-ups-margin" value="20">
        </div>
        <button class="hc-btn" onclick="hcUPSCapacityHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-ups-capacity-result">
            <div class="hc-result-item">
                <span>Önerilen UPS Kapasitesi:</span>
                <span class="hc-result-value" id="hc-res-ups-va">0 VA</span>
            </div>
            <p class="hc-ups-note">VA = (Watt / PF) * (1 + Yedek Oranı)</p>
        </div>
    </div>
    <?php
}
