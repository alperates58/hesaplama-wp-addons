<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basketbol_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basketball-cal',
        HC_PLUGIN_URL . 'modules/basketbol-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basketball-cal-css',
        HC_PLUGIN_URL . 'modules/basketbol-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-basketball-cal">
        <h3>Basketbol Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bsk-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-bsk-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bsk-intensity">Oyun Tipi / Yoğunluk</label>
            <select id="hc-bsk-intensity">
                <option value="4.5">Şut Atma / Serbest Atış</option>
                <option value="6.0">Tek Pota / Yarı Saha (Hafif Tempo)</option>
                <option value="8.0" selected>Tam Saha Maç (Rekabetçi)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bsk-time">Süre (dakika)</label>
            <input type="number" id="hc-bsk-time" placeholder="dakika" value="60">
        </div>
        
        <button class="hc-btn" onclick="hcBasketballCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-basketball-result">
            <div class="hc-result-value" id="hc-bsk-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
