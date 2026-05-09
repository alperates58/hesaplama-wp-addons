<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzme_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-swimming-cal',
        HC_PLUGIN_URL . 'modules/yuzme-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-swimming-cal-css',
        HC_PLUGIN_URL . 'modules/yuzme-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-swimming-cal">
        <h3>Yüzme Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-swi-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-swi-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-swi-style">Yüzme Stili / Yoğunluk</label>
            <select id="hc-swi-style">
                <option value="5.8">Eğlence Amaçlı (Yavaş)</option>
                <option value="8.3" selected>Orta Tempo (Kulaçlama)</option>
                <option value="10.0">Hızlı Tempo (Antrenman)</option>
                <option value="10.3">Kurbağalama</option>
                <option value="11.0">Kelebek</option>
                <option value="9.5">Sırtüstü</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-swi-time">Süre (Dakika)</label>
            <input type="number" id="hc-swi-time" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcSwimmingCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-swimming-cal-result">
            <div class="hc-result-value" id="hc-swi-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
