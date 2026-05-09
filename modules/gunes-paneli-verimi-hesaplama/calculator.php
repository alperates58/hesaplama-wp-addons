<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-efficiency',
        HC_PLUGIN_URL . 'modules/gunes-paneli-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-efficiency-css',
        HC_PLUGIN_URL . 'modules/gunes-paneli-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-efficiency">
        <h3>Güneş Paneli Verimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sv-power">Panel Gücü (Watt)</label>
            <input type="number" id="hc-sv-power" placeholder="Örn: 450" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sv-width">Panel Genişliği (cm)</label>
            <input type="number" id="hc-sv-width" placeholder="Örn: 113" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sv-height">Panel Uzunluğu (cm)</label>
            <input type="number" id="hc-sv-height" placeholder="Örn: 200" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcPanelVerimiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sv-result">
            <div class="hc-result-item">
                <span>Panel Alanı:</span>
                <span class="hc-result-value" id="hc-res-sv-area">-</span>
            </div>
            <div class="hc-result-item">
                <span>Elektriksel Verimlilik:</span>
                <span class="hc-result-value highlight" id="hc-res-sv-percent">-</span>
            </div>
            <div class="hc-result-note">
                * Standart test koşullarında (STC: 1000 W/m² ışınım) hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
