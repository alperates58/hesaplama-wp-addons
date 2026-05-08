<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlik_antrenmani_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weight-train-cal',
        HC_PLUGIN_URL . 'modules/agirlik-antrenmani-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-weight-train-cal-css',
        HC_PLUGIN_URL . 'modules/agirlik-antrenmani-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weight-train-cal">
        <h3>Ağırlık Antrenmanı Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-wt-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-wt-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-wt-intensity">Yoğunluk</label>
            <select id="hc-wt-intensity">
                <option value="3.5">Hafif</option>
                <option value="5.0" selected>Orta</option>
                <option value="7.0">Yoğun</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-wt-time">Süre (dakika)</label>
            <input type="number" id="hc-wt-time" placeholder="dakika" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcWeightTrainingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-weight-train-result">
            <div class="hc-result-value" id="hc-wt-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
