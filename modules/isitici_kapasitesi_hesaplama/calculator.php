<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isitici_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heater-calc',
        HC_PLUGIN_URL . 'modules/isitici_kapasitesi_hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-heater-calc-css',
        HC_PLUGIN_URL . 'modules/isitici_kapasitesi_hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heater">
        <h3>Isıtıcı Kapasite Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-ht-vol">Hacim (m³):</label>
            <input type="number" id="hc-ht-vol" placeholder="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-ht-temp">Hedef Sıcaklık Artışı (°C):</label>
            <input type="number" id="hc-ht-temp" value="20">
            <small>Örn: Dış 0°C -> İç 20°C ise 20 yazın.</small>
        </div>
        <button class="hc-btn" onclick="hcHeaterCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-heater-result">
            <strong>Gereken Isıtma Gücü:</strong>
            <div id="hc-ht-res-val" class="hc-result-value">-</div>
            <span>kcal / saat</span>
            <p id="hc-ht-res-kw" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
