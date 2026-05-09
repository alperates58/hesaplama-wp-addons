<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-house-co2',
        HC_PLUGIN_URL . 'modules/ev-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-house-co2-css',
        HC_PLUGIN_URL . 'modules/ev-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-house-co2">
        <h3>Ev Karbon Ayak İzi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-house-el">Aylık Elektrik Tüketimi (kWh)</label>
            <input type="number" id="hc-house-el" value="250" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-house-gas">Aylık Doğalgaz Tüketimi (m³)</label>
            <input type="number" id="hc-house-gas" value="100" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-house-water">Aylık Su Tüketimi (m³)</label>
            <input type="number" id="hc-house-water" value="10" min="0">
        </div>
        <button class="hc-btn" onclick="hcEvCO2Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ev-karbon-ayak-izi-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Karbon Ayak İzi:</span>
                <span class="hc-result-value" id="hc-res-house-total-co2">0 kg</span>
            </div>
            <div class="hc-house-breakdown">
                <div class="hc-break-item">Elektrik: <span id="hc-res-break-el">0 kg</span></div>
                <div class="hc-break-item">Doğalgaz: <span id="hc-res-break-gas">0 kg</span></div>
                <div class="hc-break-item">Su & Atık: <span id="hc-res-break-water">0 kg</span></div>
            </div>
        </div>
    </div>
    <?php
}
