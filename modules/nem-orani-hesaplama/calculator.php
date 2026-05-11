<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nem_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-humidity',
        HC_PLUGIN_URL . 'modules/nem-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-humidity">
        <h3>Bağıl Nem Oranı (RH) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rh-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-rh-temp" placeholder="°C" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rh-dew">Çiğ Noktası (Dew Point - °C)</label>
            <input type="number" id="hc-rh-dew" placeholder="°C" step="any">
        </div>

        <button class="hc-btn" onclick="hcNemOraniHesapla()">Nemi Hesapla</button>

        <div class="hc-result" id="hc-rh-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Bağıl Nem Oranı:</span>
                <span class="hc-result-value" id="hc-rh-res-total">--</span>
                <span class="hc-result-unit">%</span>
            </div>
        </div>
    </div>
    <?php
}
