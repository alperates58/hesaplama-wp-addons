<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gaz_molar_kutle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gaz-molar-kutle-hesaplama',
        HC_PLUGIN_URL . 'modules/gaz-molar-kutle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gaz-molar-kutle-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gaz-molar-kutle-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gaz-molar-kutle-hesaplama">
        <div class="hc-header">
            <h3>Gazın Molar Kütlesi Hesaplama</h3>
            <p>Gazın kütlesi, basıncı, hacmi ve sıcaklığına göre molar kütlesini bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-gas-mass">Gaz Kütlesi (gram)</label>
                <input type="number" id="hc-gas-mass" placeholder="Örn: 2" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-gas-press">Basınç (atm)</label>
                <input type="number" id="hc-gas-press" placeholder="Örn: 1" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-gas-vol">Hacim (L)</label>
                <input type="number" id="hc-gas-vol" placeholder="Örn: 1.12" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-gas-temp">Sıcaklık (°C)</label>
                <input type="number" id="hc-gas-temp" placeholder="Örn: 0" step="0.1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcGazMolarKutleHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gas-result">
            <div class="hc-res-label">Molar Kütle (MA)</div>
            <div class="hc-res-main">
                <span id="hc-res-gas-ma-val">-</span>
                <small>g / mol</small>
            </div>
            
            <div class="hc-formula-box">
                MA = (m × R × T) / (P × V)
            </div>
        </div>
    </div>
    <?php
}
