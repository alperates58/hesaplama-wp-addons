<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_alma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weight-gain',
        HC_PLUGIN_URL . 'modules/kilo-alma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-weight-gain-css',
        HC_PLUGIN_URL . 'modules/kilo-alma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weight-gain">
        <h3>Sağlıklı Kilo Alma Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wg-bmr">Günlük Yakılan Kalori (Tahmini):</label>
            <input type="number" id="hc-wg-bmr" placeholder="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wg-speed">Hız Hedefi:</label>
            <select id="hc-wg-speed">
                <option value="0.25">Yavaş (Haftada 0.25 kg)</option>
                <option value="0.5">Normal (Haftada 0.5 kg)</option>
                <option value="1.0">Hızlı (Haftada 1 kg - Spor eşliğinde)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWeightGainHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-weight-gain-result">
            <strong>Hedef Günlük Kalori Alımı:</strong>
            <div id="hc-wg-res-val" class="hc-result-value">-</div>
            <span>kcal / gün</span>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Sağlıklı kilo alımı için protein ağırlıklı beslenme ve direnç egzersizi önerilir.</p>
        </div>
    </div>
    <?php
}
