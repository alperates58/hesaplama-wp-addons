<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayakta_durma_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stand-calc',
        HC_PLUGIN_URL . 'modules/ayakta-durma-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stand-calc-css',
        HC_PLUGIN_URL . 'modules/ayakta-durma-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stand-calc">
        <h3>Ayakta Durma Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-stand-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-stand-weight" placeholder="kg" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-stand-duration">Süre (dakika)</label>
            <input type="number" id="hc-stand-duration" placeholder="dakika" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcStandCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-stand-result">
            <div class="hc-result-value" id="hc-stand-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
