<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuruyus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-walk-time',
        HC_PLUGIN_URL . 'modules/yuruyus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-walk-time-css',
        HC_PLUGIN_URL . 'modules/yuruyus-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-walk-time">
        <h3>Yürüyüş Süresi Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-wt-dist">Hedef Mesafe (km):</label>
            <input type="number" id="hc-wt-dist" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-wt-speed">Yürüyüş Hızı (km/s):</label>
            <select id="hc-wt-speed">
                <option value="4">Yavaş (4 km/s)</option>
                <option value="5" selected>Normal (5 km/s)</option>
                <option value="6">Hızlı / Tempolu (6 km/s)</option>
                <option value="7">Çok Hızlı (7 km/s)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWalkTimeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-walk-time-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-wt-res-val" class="hc-result-value">-</div>
            <span>Saat : Dakika</span>
        </div>
    </div>
    <?php
}
