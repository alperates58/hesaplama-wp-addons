<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogurt_mayalama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogurt-ferment',
        HC_PLUGIN_URL . 'modules/yogurt-mayalama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yogurt-ferment-calc">
        <h3>Yoğurt Mayalama Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-yf-temp">Mayalama Sıcaklığı (°C):</label>
            <input type="number" id="hc-yf-temp" value="45">
        </div>
        <button class="hc-btn" onclick="hcYogurtFermentHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yogurt-ferment-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-yf-val" class="hc-result-value">-</div>
            <p id="hc-yf-info"></p>
        </div>
    </div>
    <?php
}
