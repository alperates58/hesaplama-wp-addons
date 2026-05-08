<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fitness_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fitness-cal',
        HC_PLUGIN_URL . 'modules/fitness-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fitness-cal-css',
        HC_PLUGIN_URL . 'modules/fitness-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fitness-cal">
        <h3>Fitness Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fit-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-fit-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fit-intensity">Antrenman Yoğunluğu</label>
            <select id="hc-fit-intensity">
                <option value="4.0">Hafif (Isınma / Esneme)</option>
                <option value="5.5" selected>Orta (Genel Fitness)</option>
                <option value="7.5">Yoğun (Kardiyo Ağırlıklı)</option>
                <option value="10.0">Çok Yoğun (HIIT / Crossfit)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fit-time">Süre (dakika)</label>
            <input type="number" id="hc-fit-time" placeholder="dakika" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcFitnessCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fitness-result">
            <div class="hc-result-value" id="hc-fit-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
