<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adim_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-step-calories',
        HC_PLUGIN_URL . 'modules/adim-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-step-calories-css',
        HC_PLUGIN_URL . 'modules/adim-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-step-calories">
        <h3>Adım Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-s-steps">Adım Sayısı</label>
            <input type="number" id="hc-s-steps" value="10000" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-s-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-s-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-s-pace">Yürüyüş Temposu</label>
            <select id="hc-s-pace">
                <option value="0.035">Yavaş / Gezinti</option>
                <option value="0.045" selected>Normal Tempo</option>
                <option value="0.055">Hızlı / Tempolu</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcStepCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-step-calories-result">
            <div class="hc-result-value" id="hc-s-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yakılan Tahmini Kalori (kcal)</p>
            <p id="hc-s-distance" style="text-align:center; font-size: 0.85em; color: #888; margin-top: 5px;"></p>
        </div>
    </div>
    <?php
}
