<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_cihaz_watt_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elektrikli-cihaz-watt-hesaplama',
        HC_PLUGIN_URL . 'modules/elektrikli-cihaz-watt-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elektrikli-cihaz-watt-hesaplama-css',
        HC_PLUGIN_URL . 'modules/elektrikli-cihaz-watt-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-device-watt">
        <h3>Cihaz Güç (Watt) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dw-volt">Gerilim (Volt - V)</label>
            <input type="number" id="hc-dw-volt" value="220">
        </div>
        <div class="hc-form-group">
            <label for="hc-dw-amp">Akım (Amper - A)</label>
            <input type="number" id="hc-dw-amp" placeholder="Örn: 5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcElektrikliCihazWattHesapla()">Watt Hesapla</button>
        <div class="hc-result" id="hc-dw-result">
            <div class="hc-result-label">Cihaz Gücü:</div>
            <div class="hc-result-value" id="hc-dw-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*Formül: Güç (W) = Gerilim (V) x Akım (A)</p>
        </div>
    </div>
    <?php
}
