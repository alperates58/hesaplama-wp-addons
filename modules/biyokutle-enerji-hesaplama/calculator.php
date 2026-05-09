<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyokutle_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biomass-energy',
        HC_PLUGIN_URL . 'modules/biyokutle-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-biomass-energy-css',
        HC_PLUGIN_URL . 'modules/biyokutle-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biomass-energy">
        <h3>Biyokütle Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-be-mass">Biyokütle Miktarı (kg)</label>
            <input type="number" id="hc-be-mass" placeholder="Örn: 100" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-be-type">Biyokütle Tipi</label>
            <select id="hc-be-type">
                <option value="18">Odun Peleti (18 MJ/kg)</option>
                <option value="15">Kuru Odun (15 MJ/kg)</option>
                <option value="10">Tarımsal Atık (10 MJ/kg)</option>
                <option value="12">Mısır Sapı (12 MJ/kg)</option>
                <option value="16">Fındık Kabuğu (16 MJ/kg)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcBiyokutleEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-result-item">
                <span>Toplam Enerji (MJ):</span>
                <span class="hc-result-value" id="hc-res-be-mj">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Enerji (kWh):</span>
                <span class="hc-result-value" id="hc-res-be-kwh">-</span>
            </div>
        </div>
    </div>
    <?php
}
