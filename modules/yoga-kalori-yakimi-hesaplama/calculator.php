<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yoga_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yoga-cal',
        HC_PLUGIN_URL . 'modules/yoga-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yoga-cal-css',
        HC_PLUGIN_URL . 'modules/yoga-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yoga-cal">
        <h3>Yoga Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yg-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-yg-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-yg-intensity">Yoga Türü / Yoğunluk</label>
            <select id="hc-yg-intensity">
                <option value="2.0">Hatha (Hafif Tempo)</option>
                <option value="3.0" selected>Vinyasa / Genel (Orta Tempo)</option>
                <option value="4.0">Ashtanga / Power Yoga (Yüksek Tempo)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-yg-time">Süre (dakika)</label>
            <input type="number" id="hc-yg-time" placeholder="dakika" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcYogaCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-yoga-result">
            <div class="hc-result-value" id="hc-yg-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
