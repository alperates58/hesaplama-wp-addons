<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merdiven_cikma_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stairs-cal',
        HC_PLUGIN_URL . 'modules/merdiven-cikma-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stairs-cal-css',
        HC_PLUGIN_URL . 'modules/merdiven-cikma-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stairs-cal">
        <h3>Merdiven Çıkma Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-st-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-st-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-type">Eylem Türü</label>
            <select id="hc-st-type">
                <option value="8.0">Merdiven Çıkma (Normal Tempo)</option>
                <option value="15.0">Merdiven Çıkma (Hızlı / Koşar Adım)</option>
                <option value="3.5">Merdiven İnme</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-st-time">Süre (Dakika)</label>
            <input type="number" id="hc-st-time" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcStairsCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-stairs-cal-result">
            <div class="hc-result-value" id="hc-st-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
