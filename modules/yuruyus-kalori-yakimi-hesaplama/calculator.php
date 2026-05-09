<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuruyus_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-walking-cal',
        HC_PLUGIN_URL . 'modules/yuruyus-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-walking-cal-css',
        HC_PLUGIN_URL . 'modules/yuruyus-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-walking-cal">
        <h3>Yürüyüş Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-w-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-w-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-w-speed">Yürüyüş Hızı</label>
            <select id="hc-w-speed">
                <option value="3.0">Yavaş (4 km/s)</option>
                <option value="3.5" selected>Normal (5 km/s)</option>
                <option value="4.3">Hızlı (6 km/s)</option>
                <option value="5.0">Çok Hızlı (7 km/s)</option>
                <option value="7.0">Tempolu (8 km/s)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-w-time">Süre (Dakika)</label>
            <input type="number" id="hc-w-time" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcWalkingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-walking-cal-result">
            <div class="hc-result-value" id="hc-w-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
            <p id="hc-w-distance" style="text-align:center; font-size: 0.85em; color: #888; margin-top: 5px;"></p>
        </div>
    </div>
    <?php
}
