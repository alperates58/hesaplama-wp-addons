<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_degisim_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-avg-rate',
        HC_PLUGIN_URL . 'modules/ortalama-degisim-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-avg-rate">
        <h3>Ortalama Değişim Hızı [f(x2)-f(x1)] / (x2-x1)</h3>
        <div class="hc-form-group">
            <label>Nokta 1 (x1):</label>
            <input type="number" id="hc-ar-x1" step="any" placeholder="1">
        </div>
        <div class="hc-form-group">
            <label>Değer 1 [f(x1)]:</label>
            <input type="number" id="hc-ar-y1" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>Nokta 2 (x2):</label>
            <input type="number" id="hc-ar-x2" step="any" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label>Değer 2 [f(x2)]:</label>
            <input type="number" id="hc-ar-y2" step="any" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcAvgRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-avg-rate-result">
            <strong>Ortalama Değişim Hızı:</strong>
            <div id="hc-ar-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
