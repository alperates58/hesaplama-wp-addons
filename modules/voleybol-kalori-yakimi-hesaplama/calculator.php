<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_voleybol_kalori_yakimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-volleyball-cal',
        HC_PLUGIN_URL . 'modules/voleybol-kalori-yakimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-volleyball-cal-css',
        HC_PLUGIN_URL . 'modules/voleybol-kalori-yakimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-volleyball-cal">
        <h3>Voleybol Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vb-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-vb-weight" placeholder="kg" value="70">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-vb-intensity">Oyun Tipi / Ortam</label>
            <select id="hc-vb-intensity">
                <option value="3.0">Eğlence Amaçlı (Hafif Tempo)</option>
                <option value="4.0" selected>Salon / Maç (Orta Tempo)</option>
                <option value="8.0">Plaj Voleybolu (Kumda)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-vb-time">Süre (dakika)</label>
            <input type="number" id="hc-vb-time" placeholder="dakika" value="60">
        </div>
        
        <button class="hc-btn" onclick="hcVolleyballCaloriesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-volleyball-result">
            <div class="hc-result-value" id="hc-vb-res-val">-</div>
            <p style="text-align:center; font-size:0.9em; color:#666;">Yakılan Kalori (kcal)</p>
        </div>
    </div>
    <?php
}
