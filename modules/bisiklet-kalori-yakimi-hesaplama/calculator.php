<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cycling-cal',
        HC_PLUGIN_URL . 'modules/bisiklet-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cycling-cal-css',
        HC_PLUGIN_URL . 'modules/bisiklet-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cycling-cal">
        <h3>Bisiklet Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bi-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-bi-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-bi-speed">Sürüş Hızı</label>
            <select id="hc-bi-speed">
                <option value="4.0">Gezinti (<16 km/s)</option>
                <option value="6.8" selected>Orta (16-19 km/s)</option>
                <option value="8.0">Tempolu (19-22 km/s)</option>
                <option value="10.0">Hızlı (22-25 km/s)</option>
                <option value="12.0">Çok Hızlı (>25 km/s)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bi-time">Süre (Dakika)</label>
            <input type="number" id="hc-bi-time" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcCyclingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cycling-cal-result">
            <div class="hc-result-value" id="hc-bi-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
            <p id="hc-bi-distance" style="text-align:center; font-size: 0.85em; color: #888; margin-top: 5px;"></p>
        </div>
    </div>
    <?php
}
