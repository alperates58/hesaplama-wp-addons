<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_bisiklet_batarya_menzili_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elektrikli-bisiklet-batarya-menzili-hesaplama',
        HC_PLUGIN_URL . 'modules/elektrikli-bisiklet-batarya-menzili-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elektrikli-bisiklet-batarya-menzili-hesaplama-css',
        HC_PLUGIN_URL . 'modules/elektrikli-bisiklet-batarya-menzili-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-batt-range">
        <h3>Elektrikli Bisiklet Detaylı Menzil</h3>
        <div class="hc-form-group">
            <label for="hc-br-wh">Batarya Kapasitesi (Wh)</label>
            <input type="number" id="hc-br-wh" value="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-br-health">Batarya Sağlığı (%)</label>
            <input type="range" id="hc-br-health" min="50" max="100" value="100" oninput="document.getElementById('hc-br-h-val').innerText = this.value + '%'">
            <span id="hc-br-h-val">100%</span>
        </div>
        <div class="hc-form-group">
            <label for="hc-br-temp">Hava Sıcaklığı (°C)</label>
            <select id="hc-br-temp">
                <option value="1.0">Sıcak (20-30°C)</option>
                <option value="0.9" selected>Ilıman (10-20°C)</option>
                <option value="0.75">Soğuk (0-10°C)</option>
                <option value="0.6">Çok Soğuk (< 0°C)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcElektrikliBisikletBataryaMenziliHesapla()">Detaylı Analiz</button>
        <div class="hc-result" id="hc-batt-result">
            <div class="hc-result-label">Net Tahmini Menzil:</div>
            <div class="hc-result-value" id="hc-br-val">-</div>
            <div id="hc-br-table" style="margin-top: 15px;"></div>
        </div>
    </div>
    <?php
}
