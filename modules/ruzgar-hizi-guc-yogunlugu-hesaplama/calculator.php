<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_hizi_guc_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wind-density',
        HC_PLUGIN_URL . 'modules/ruzgar-hizi-guc-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wind-density-css',
        HC_PLUGIN_URL . 'modules/ruzgar-hizi-guc-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wind-density">
        <h3>Rüzgar Güç Yoğunluğu</h3>
        
        <div class="hc-form-group">
            <label for="hc-wd-speed">Rüzgar Hızı (m/s)</label>
            <input type="number" id="hc-wd-speed" placeholder="Örn: 8" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wd-rho">Hava Yoğunluğu (kg/m³)</label>
            <input type="number" id="hc-wd-rho" value="1.225" step="0.001">
            <small>Deniz seviyesinde standart yoğunluk 1.225 kg/m³'tür.</small>
        </div>

        <button class="hc-btn" onclick="hcRuzgarYogunlukHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wd-result">
            <div class="hc-result-item">
                <span>Güç Yoğunluğu:</span>
                <span class="hc-result-value highlight" id="hc-res-wd-val">-</span>
            </div>
            <div class="hc-result-note">
                * P/A = 0.5 * ρ * v³ formülü ile hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
