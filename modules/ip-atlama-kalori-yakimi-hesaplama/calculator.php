<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ip_atlama_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jumprope-cal',
        HC_PLUGIN_URL . 'modules/ip-atlama-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jumprope-cal-css',
        HC_PLUGIN_URL . 'modules/ip-atlama-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jumprope-cal">
        <h3>İp Atlama Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-jr-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-jr-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-jr-speed">Atlama Hızı</label>
            <select id="hc-jr-speed">
                <option value="8.8">Yavaş (<100 atlama/dk)</option>
                <option value="11.8" selected>Orta (100-120 atlama/dk)</option>
                <option value="12.3">Hızlı (>120 atlama/dk)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-jr-time">Süre (Dakika)</label>
            <input type="number" id="hc-jr-time" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcJumpRopeCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-jumprope-cal-result">
            <div class="hc-result-value" id="hc-jr-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
