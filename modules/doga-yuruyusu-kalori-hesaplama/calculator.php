<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doga_yuruyusu_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hiking-cal',
        HC_PLUGIN_URL . 'modules/doga-yuruyusu-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hiking-cal-css',
        HC_PLUGIN_URL . 'modules/doga-yuruyusu-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hiking-cal">
        <h3>Doğa Yürüyüşü Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hk-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-hk-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hk-intensity">Tempo / Yük Durumu</label>
            <select id="hc-hk-intensity">
                <option value="6.0">Normal Tempo (Çantasız)</option>
                <option value="7.3">Hafif Sırt Çantalı (5 kg'a kadar)</option>
                <option value="8.3" selected>Orta Yüklü (5-10 kg)</option>
                <option value="9.0">Ağır Yüklü (>10 kg) / Zorlu Arazi</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hk-time">Süre (dakika)</label>
            <input type="number" id="hc-hk-time" placeholder="dakika" value="60">
        </div>
        
        <button class="hc-btn" onclick="hcHikingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hiking-result">
            <div class="hc-result-value" id="hc-hk-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
