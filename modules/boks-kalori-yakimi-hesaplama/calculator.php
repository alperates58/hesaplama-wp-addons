<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boks_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boxing-cal',
        HC_PLUGIN_URL . 'modules/boks-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boxing-cal-css',
        HC_PLUGIN_URL . 'modules/boks-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boxing-cal">
        <h3>Boks Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-box-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-box-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-box-intensity">Antrenman Türü / Yoğunluk</label>
            <select id="hc-box-intensity">
                <option value="5.5">Kum Torbası (Orta Tempo)</option>
                <option value="7.8" selected>Gölge Boksu (Shadow Boxing)</option>
                <option value="9.8">Sparring / Maç (Yüksek Tempo)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-box-time">Süre (dakika)</label>
            <input type="number" id="hc-box-time" placeholder="dakika" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcBoxingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-boxing-result">
            <div class="hc-result-value" id="hc-box-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
