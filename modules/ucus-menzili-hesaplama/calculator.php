<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucus_menzili_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flight-range',
        HC_PLUGIN_URL . 'modules/ucus-menzili-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-flight-range-css',
        HC_PLUGIN_URL . 'modules/ucus-menzili-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flight-range">
        <h3>Uçuş Menzili Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-fr-fuel">Mevcut Yakıt [Litre]</label>
            <input type="number" id="hc-fr-fuel" value="20000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-cons">Tüketim Oranı [Litre/Saat]</label>
            <input type="number" id="hc-fr-cons" value="2500">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-speed">Ortalama Hız [km/s]</label>
            <input type="number" id="hc-fr-speed" value="850">
        </div>
        <button class="hc-btn" onclick="hcFlightRangeHesapla()">Menzili Hesapla</button>
        <div class="hc-result" id="hc-flight-range-result">
            <div class="hc-result-item">
                <span>Maksimum Menzil:</span>
                <span class="hc-result-value" id="hc-res-fr-val">0 km</span>
            </div>
            <div class="hc-result-item">
                <span>Uçuş Süresi:</span>
                <span id="hc-res-fr-time">0 saat</span>
            </div>
        </div>
    </div>
    <?php
}
