<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zumba_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-zumba-cal',
        HC_PLUGIN_URL . 'modules/zumba-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-zumba-cal-css',
        HC_PLUGIN_URL . 'modules/zumba-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-zumba-cal">
        <h3>Zumba Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-zb-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-zb-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-zb-intensity">Tempo / Yoğunluk</label>
            <select id="hc-zb-intensity">
                <option value="5.0">Düşük Tempo</option>
                <option value="6.5" selected>Orta Tempo / Normal Sınıf</option>
                <option value="8.0">Yüksek Tempo (Enerjik)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-zb-time">Süre (dakika)</label>
            <input type="number" id="hc-zb-time" placeholder="dakika" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcZumbaCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-zumba-result">
            <div class="hc-result-value" id="hc-zb-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
