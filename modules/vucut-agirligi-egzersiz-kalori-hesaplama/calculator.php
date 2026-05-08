<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_agirligi_egzersiz_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bw-cal',
        HC_PLUGIN_URL . 'modules/vucut-agirligi-egzersiz-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bw-cal-css',
        HC_PLUGIN_URL . 'modules/vucut-agirligi-egzersiz-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bw-cal">
        <h3>Vücut Ağırlığı Egzersiz Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bw-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-bw-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bw-intensity">Tempo (Efor)</label>
            <select id="hc-bw-intensity">
                <option value="3.5">Hafif Efor (Örn: Kolay Mekik, Stretching)</option>
                <option value="5.0" selected>Orta Efor (Örn: Normal Şınav, Squat)</option>
                <option value="8.0">Yüksek Efor (Örn: Hızlı Tempo, Pull-up)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bw-time">Süre (dakika)</label>
            <input type="number" id="hc-bw-time" placeholder="dakika" value="15">
        </div>
        
        <button class="hc-btn" onclick="hcBodyweightCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bw-result">
            <div class="hc-result-value" id="hc-bw-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
