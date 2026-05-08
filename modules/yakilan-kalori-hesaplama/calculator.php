<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakilan_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-calories',
        HC_PLUGIN_URL . 'modules/yakilan-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-calories-css',
        HC_PLUGIN_URL . 'modules/yakilan-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-calories">
        <h3>Yakılan Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-c-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-c-weight" placeholder="kg" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-c-activity">Aktivite Türü</label>
            <select id="hc-c-activity">
                <option value="3.5">Yürüyüş (Orta Tempo)</option>
                <option value="5.0">Yürüyüş (Hızlı Tempo)</option>
                <option value="8.3">Koşu (8 km/s)</option>
                <option value="11.5">Koşu (12 km/s)</option>
                <option value="7.5">Bisiklet (20 km/s)</option>
                <option value="5.8">Yüzme (Hafif)</option>
                <option value="9.8">Yüzme (Performans)</option>
                <option value="6.0">Ağırlık Antrenmanı</option>
                <option value="8.0">Fitness / Kardiyo</option>
                <option value="3.0">Pilates</option>
                <option value="2.5">Yoga</option>
                <option value="10.0">İp Atlama</option>
                <option value="8.0">Futbol / Basketbol</option>
                <option value="1.3">Ayakta Durma</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-c-duration">Süre (Dakika)</label>
            <input type="number" id="hc-c-duration" placeholder="dakika" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-calories-result">
            <div class="hc-result-value" id="hc-c-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Toplam Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
