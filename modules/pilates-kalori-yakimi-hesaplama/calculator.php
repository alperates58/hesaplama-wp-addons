<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pilates_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pilates-cal',
        HC_PLUGIN_URL . 'modules/pilates-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pilates-cal-css',
        HC_PLUGIN_URL . 'modules/pilates-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pilates-cal">
        <h3>Pilates Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pil-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-pil-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-pil-intensity">Yoğunluk / Seviye</label>
            <select id="hc-pil-intensity">
                <option value="2.5">Başlangıç Seviyesi (Hafif)</option>
                <option value="3.0" selected>Orta Seviye / Mat Pilates</option>
                <option value="4.0">İleri Seviye / Reformer (Ağır)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-pil-time">Süre (dakika)</label>
            <input type="number" id="hc-pil-time" placeholder="dakika" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcPilatesCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pilates-result">
            <div class="hc-result-value" id="hc-pil-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
