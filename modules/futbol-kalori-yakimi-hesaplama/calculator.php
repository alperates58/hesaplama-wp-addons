<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_futbol_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-football-cal',
        HC_PLUGIN_URL . 'modules/futbol-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-football-cal-css',
        HC_PLUGIN_URL . 'modules/futbol-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-football-cal">
        <h3>Futbol Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fb-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-fb-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fb-intensity">Oyun Tipi / Yoğunluk</label>
            <select id="hc-fb-intensity">
                <option value="7.0">Eğlence Amaçlı (Düşük Tempo)</option>
                <option value="10.0" selected>Rekabetçi / Maç (Orta - Yüksek Tempo)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fb-time">Süre (dakika)</label>
            <input type="number" id="hc-fb-time" placeholder="dakika" value="90">
        </div>
        
        <button class="hc-btn" onclick="hcFootballCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-football-result">
            <div class="hc-result-value" id="hc-fb-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
