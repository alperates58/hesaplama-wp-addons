<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-running-cal',
        HC_PLUGIN_URL . 'modules/kosu-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-running-cal-css',
        HC_PLUGIN_URL . 'modules/kosu-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-running-cal">
        <h3>Koşu Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-r-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-r-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-r-speed">Koşu Hızı</label>
            <select id="hc-r-speed">
                <option value="6.0">Hafif Tempo (6 km/s)</option>
                <option value="8.3" selected>Orta Tempo (8 km/s)</option>
                <option value="9.8">Hızlı Tempo (10 km/s)</option>
                <option value="11.5">Çok Hızlı (12 km/s)</option>
                <option value="14.5">Sprint (16 km/s)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-r-time">Süre (Dakika)</label>
            <input type="number" id="hc-r-time" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcRunningCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-running-cal-result">
            <div class="hc-result-value" id="hc-r-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
            <p id="hc-r-distance" style="text-align:center; font-size: 0.85em; color: #888; margin-top: 5px;"></p>
        </div>
    </div>
    <?php
}
