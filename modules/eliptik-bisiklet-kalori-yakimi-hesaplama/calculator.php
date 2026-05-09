<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eliptik_bisiklet_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elliptical-cal',
        HC_PLUGIN_URL . 'modules/eliptik-bisiklet-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elliptical-cal-css',
        HC_PLUGIN_URL . 'modules/eliptik-bisiklet-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elliptical-cal">
        <h3>Eliptik Bisiklet Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-e-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-e-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-e-intensity">Egzersiz Yoğunluğu</label>
            <select id="hc-e-intensity">
                <option value="5.0">Düşük Yoğunluk</option>
                <option value="8.0" selected>Orta Yoğunluk</option>
                <option value="12.0">Yüksek Yoğunluk</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-e-time">Süre (Dakika)</label>
            <input type="number" id="hc-e-time" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcEllipticalCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-elliptical-cal-result">
            <div class="hc-result-value" id="hc-e-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
