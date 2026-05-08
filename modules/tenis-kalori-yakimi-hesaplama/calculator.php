<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tenis_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tennis-cal',
        HC_PLUGIN_URL . 'modules/tenis-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tennis-cal-css',
        HC_PLUGIN_URL . 'modules/tenis-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tennis-cal">
        <h3>Tenis Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tn-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-tn-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-tn-intensity">Oyun Tipi / Tempo</label>
            <select id="hc-tn-intensity">
                <option value="5.0">Çiftler Maçı (Orta Tempo)</option>
                <option value="7.3" selected>Tekler Maçı (Normal Tempo)</option>
                <option value="8.0">Tekler Maçı (Yüksek Tempo / Rekabetçi)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-tn-time">Süre (dakika)</label>
            <input type="number" id="hc-tn-time" placeholder="dakika" value="60">
        </div>
        
        <button class="hc-btn" onclick="hcTennisCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tennis-result">
            <div class="hc-result-value" id="hc-tn-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
