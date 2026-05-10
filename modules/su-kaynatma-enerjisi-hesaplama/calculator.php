<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_kaynatma_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-boil-energy',
        HC_PLUGIN_URL . 'modules/su-kaynatma-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-boil-energy-calc">
        <h3>Su Kaynatma Enerji Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-we-water">Su Miktarı (Litre):</label>
            <input type="number" id="hc-we-water" placeholder="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-we-temp">Başlangıç Sıcaklığı (°C):</label>
            <input type="number" id="hc-we-temp" value="20">
        </div>
        <button class="hc-btn" onclick="hcWaterBoilEnergyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-boil-energy-result">
            <strong>Gereken Enerji:</strong>
            <div id="hc-we-val" class="hc-result-value">-</div>
            <p id="hc-we-info"></p>
        </div>
    </div>
    <?php
}
