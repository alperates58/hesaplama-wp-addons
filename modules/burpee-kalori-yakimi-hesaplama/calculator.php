<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burpee_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burpee-cal',
        HC_PLUGIN_URL . 'modules/burpee-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burpee-cal-css',
        HC_PLUGIN_URL . 'modules/burpee-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burpee-cal">
        <h3>Burpee Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-b-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-b-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-b-type">Hesaplama Türü</label>
            <select id="hc-b-type" onchange="hcToggleBurpeeMode()">
                <option value="count">Tekrar Sayısı</option>
                <option value="time">Süre (Dakika)</option>
            </select>
        </div>

        <div id="hc-b-count-group" class="hc-form-group">
            <label for="hc-b-count">Burpee Sayısı</label>
            <input type="number" id="hc-b-count" value="20">
        </div>

        <div id="hc-b-time-group" class="hc-form-group" style="display:none;">
            <label for="hc-b-time">Egzersiz Süresi (Dakika)</label>
            <input type="number" id="hc-b-time" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcBurpeeCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-burpee-cal-result">
            <div class="hc-result-value" id="hc-b-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
