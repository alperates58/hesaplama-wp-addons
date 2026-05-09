<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_debisinden_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flow-energy',
        HC_PLUGIN_URL . 'modules/su-debisinden-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-flow-energy-css',
        HC_PLUGIN_URL . 'modules/su-debisinden-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flow-energy">
        <h3>Su Akış Enerjisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fe-flow">Su Debisi (Litre/Saniye)</label>
            <input type="number" id="hc-fe-flow" placeholder="Örn: 100" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-fe-speed">Akış Hızı (m/s)</label>
            <input type="number" id="hc-fe-speed" placeholder="Örn: 2" step="0.1">
            <small>Kanal veya nehirdeki suyun hızı.</small>
        </div>

        <button class="hc-btn" onclick="hcAkisEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fe-result">
            <div class="hc-result-item">
                <span>Kinetik Güç:</span>
                <span class="hc-result-value highlight" id="hc-res-fe-watt">-</span>
            </div>
            <div class="hc-result-item">
                <span>Günlük Maksimum Üretim:</span>
                <span class="hc-result-value" id="hc-res-fe-kwh">-</span>
            </div>
            <div class="hc-result-note">
                * P = 0.5 * ρ * Q * v² formülü ile hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
