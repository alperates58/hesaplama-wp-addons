<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-daily-water',
        HC_PLUGIN_URL . 'modules/gunluk-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-daily-water-calc">
        <h3>Günlük Su İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-water-weight">Vücut Ağırlığı (kg):</label>
            <input type="number" id="hc-water-weight" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-water-activity">Günlük Aktivite Seviyesi:</label>
            <select id="hc-water-activity">
                <option value="0">Az (Hareketsiz)</option>
                <option value="0.5">Orta (Günde 30 dk spor)</option>
                <option value="1.0">Yüksek (Ağır spor/iş)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDailyWaterHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daily-water-result">
            <strong>Günlük Su İhtiyacınız:</strong>
            <div id="hc-water-val" class="hc-result-value">-</div>
            <p id="hc-water-glasses"></p>
        </div>
    </div>
    <?php
}
