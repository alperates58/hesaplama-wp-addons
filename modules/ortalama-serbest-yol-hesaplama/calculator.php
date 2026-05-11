<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_serbest_yol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-osy',
        HC_PLUGIN_URL . 'modules/ortalama-serbest-yol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-osy">
        <h3>Ortalama Serbest Yol (λ) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-osy-temp">Sıcaklık (T - °C)</label>
            <input type="number" id="hc-osy-temp" placeholder="°C" step="any" value="25">
        </div>

        <div class="hc-form-group">
            <label for="hc-osy-press">Basınç (P - Pascal)</label>
            <input type="number" id="hc-osy-press" placeholder="Pa" step="any" value="101325">
        </div>

        <div class="hc-form-group">
            <label for="hc-osy-diam">Molekül Çapı (d - nm)</label>
            <input type="number" id="hc-osy-diam" placeholder="nanometre (Örn: 0.3)" step="any" value="0.33">
            <small>Hava için yaklaşık 0.33 nm.</small>
        </div>

        <button class="hc-btn" onclick="hcOsyHesapla()">λ Hesapla</button>

        <div class="hc-result" id="hc-osy-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Ortalama Serbest Yol (λ):</span>
                <span class="hc-result-value" id="hc-osy-res-total">--</span>
                <span class="hc-result-unit">metre</span>
            </div>
        </div>
    </div>
    <?php
}
