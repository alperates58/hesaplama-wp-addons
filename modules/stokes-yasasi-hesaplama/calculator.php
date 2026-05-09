<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stokes_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stokes',
        HC_PLUGIN_URL . 'modules/stokes-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stokes-css',
        HC_PLUGIN_URL . 'modules/stokes-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stokes">
        <h3>Stokes Çökelme Hızı (v)</h3>
        <div class="hc-form-group">
            <label for="hc-sl-r">Parçacık Yarıçapı (r) [μm]</label>
            <input type="number" id="hc-sl-r" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-rhop">Parçacık Yoğunluğu (ρp) [kg/m³]</label>
            <input type="number" id="hc-sl-rhop" value="2500">
            <small>Kum: ~2600</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-rhof">Akışkan Yoğunluğu (ρf) [kg/m³]</label>
            <input type="number" id="hc-sl-rhof" value="1000">
            <small>Su: 1000</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-mu">Dinamik Viskozite (μ) [Pa·s]</label>
            <input type="number" id="hc-sl-mu" value="0.001" step="0.0001">
            <small>Su (20°C): 0.001</small>
        </div>
        <button class="hc-btn" onclick="hcStokesHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-stokes-result">
            <div class="hc-result-item">
                <span>Çökelme Hızı (v):</span>
                <span class="hc-result-value" id="hc-res-sl-val">0 m/s</span>
            </div>
            <p class="hc-sl-note">Not: Stokes yasası düşük Reynolds sayıları için geçerlidir.</p>
        </div>
    </div>
    <?php
}
