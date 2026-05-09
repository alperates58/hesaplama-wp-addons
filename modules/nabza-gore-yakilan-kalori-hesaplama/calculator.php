<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nabza_gore_yakilan_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-calories',
        HC_PLUGIN_URL . 'modules/nabza-gore-yakilan-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-calories-css',
        HC_PLUGIN_URL . 'modules/nabza-gore-yakilan-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-calories">
        <h3>Nabza Göre Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hr-gender">Cinsiyet</label>
            <select id="hc-hr-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-hr-age">Yaş</label>
            <input type="number" id="hc-hr-age" value="30">
        </div>

        <div class="hc-form-group">
            <label for="hc-hr-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-hr-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-hr-bpm">Ortalama Nabız (BPM)</label>
            <input type="number" id="hc-hr-bpm" value="130" placeholder="atım/dakika">
        </div>

        <div class="hc-form-group">
            <label for="hc-hr-duration">Egzersiz Süresi (Dakika)</label>
            <input type="number" id="hc-hr-duration" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcHRCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hr-calories-result">
            <div class="hc-result-value" id="hc-hr-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
