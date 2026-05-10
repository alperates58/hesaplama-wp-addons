<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zeytinyagi_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olive-yield',
        HC_PLUGIN_URL . 'modules/zeytinyagi-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-olive-yield-calc">
        <h3>Zeytinyağı Verim Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-oy-weight">Zeytin Miktarı (kg):</label>
            <input type="number" id="hc-oy-weight" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-oy-ratio">Tahmini Verim Oranı (Örn: 5'e 1):</label>
            <select id="hc-oy-ratio">
                <option value="5">Ortalama (5 kg Zeytin -> 1 L Yağ)</option>
                <option value="4">Yüksek Verim (4 kg Zeytin -> 1 L Yağ)</option>
                <option value="6">Düşük Verim (6 kg Zeytin -> 1 L Yağ)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOliveYieldHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olive-yield-result">
            <strong>Tahmini Yağ Miktarı:</strong>
            <div id="hc-oy-val" class="hc-result-value">-</div>
            <p id="hc-oy-info"></p>
        </div>
    </div>
    <?php
}
