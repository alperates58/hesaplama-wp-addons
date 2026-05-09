<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_firin_sicakligi_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oven-temp',
        HC_PLUGIN_URL . 'modules/firin-sicakligi-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oven-temp-css',
        HC_PLUGIN_URL . 'modules/firin-sicakligi-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oven-temp">
        <h3>Fırın Sıcaklığı Dönüştür</h3>
        <div class="hc-form-group">
            <label for="hc-ot-val">Sıcaklık Değeri</label>
            <input type="number" id="hc-ot-val" value="180">
        </div>
        <div class="hc-form-group">
            <label for="hc-ot-from">Kaynak Birim</label>
            <select id="hc-ot-from">
                <option value="C">Celsius (°C)</option>
                <option value="F">Fahrenheit (°F)</option>
                <option value="G">Gas Mark</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOvenTempHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-oven-temp-result">
            <div class="hc-ot-grid">
                <div class="hc-ot-item"> <span>Celsius:</span> <b id="hc-res-ot-c">0 °C</b> </div>
                <div class="hc-ot-item"> <span>Fahrenheit:</span> <b id="hc-res-ot-f">0 °F</b> </div>
                <div class="hc-ot-item"> <span>Gas Mark:</span> <b id="hc-res-ot-g">0</b> </div>
            </div>
        </div>
    </div>
    <?php
}
