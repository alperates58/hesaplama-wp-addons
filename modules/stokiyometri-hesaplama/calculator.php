<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stokiyometri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stokiyometri-hesaplama',
        HC_PLUGIN_URL . 'modules/stokiyometri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stokiyometri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/stokiyometri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stoichiometry">
        <h3>Stokiyometri Hesaplama</h3>
        <div class="hc-form-group">
            <label>A + B ➔ C + D Oranları</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-st-coeff1" placeholder="Katsayı 1" value="1" style="width:50%">
                <input type="number" id="hc-st-coeff2" placeholder="Katsayı 2" value="1" style="width:50%">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-st-mol1">Bileşen 1 Miktarı (mol)</label>
            <input type="number" id="hc-st-mol1" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcStokiyometriHesapla()">Diğerini Hesapla</button>
        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-label">Gereken Bileşen 2:</div>
            <div class="hc-result-value" id="hc-st-val">-</div>
        </div>
    </div>
    <?php
}
