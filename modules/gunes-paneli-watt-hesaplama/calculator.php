<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_watt_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-watt',
        HC_PLUGIN_URL . 'modules/gunes-paneli-watt-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-watt-css',
        HC_PLUGIN_URL . 'modules/gunes-paneli-watt-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-watt">
        <h3>Güneş Paneli Watt Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sw-vmp">Maksimum Güç Gerilimi (Vmp - Volt)</label>
            <input type="number" id="hc-sw-vmp" placeholder="Örn: 41.5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sw-imp">Maksimum Güç Akımı (Imp - Amper)</label>
            <input type="number" id="hc-sw-imp" placeholder="Örn: 10.85" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcPanelWattHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sw-result">
            <div class="hc-result-item">
                <span>Panel Gücü:</span>
                <span class="hc-result-value highlight" id="hc-res-sw-watt">-</span>
            </div>
            <div class="hc-result-note">
                * Panel etiketindeki Vmp ve Imp değerlerini çarpımı gerçek çalışma gücünü verir.
            </div>
        </div>
    </div>
    <?php
}
