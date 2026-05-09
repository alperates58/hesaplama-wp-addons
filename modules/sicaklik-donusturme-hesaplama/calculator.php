<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sicaklik_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-temp-conv',
        HC_PLUGIN_URL . 'modules/sicaklik-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-temp-conv-css',
        HC_PLUGIN_URL . 'modules/sicaklik-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temp-conv">
        <h3>Sıcaklık Birim Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-tc-val">Değer</label>
            <input type="number" id="hc-tc-val" value="100" oninput="hcTempConvHesapla()">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-unit">Giriş Birimi</label>
            <select id="hc-tc-unit" onchange="hcTempConvHesapla()">
                <option value="C">Celsius (°C)</option>
                <option value="F">Fahrenheit (°F)</option>
                <option value="K">Kelvin (K)</option>
            </select>
        </div>
        <div class="hc-result visible" id="hc-temp-conv-result">
            <div class="hc-result-item">
                <span>Celsius:</span>
                <span class="hc-result-value" id="hc-res-tc-c">100 °C</span>
            </div>
            <div class="hc-result-item">
                <span>Fahrenheit:</span>
                <span id="hc-res-tc-f">212 °F</span>
            </div>
            <div class="hc-result-item">
                <span>Kelvin:</span>
                <span id="hc-res-tc-k">373.15 K</span>
            </div>
        </div>
    </div>
    <?php
}
