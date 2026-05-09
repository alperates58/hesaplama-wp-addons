<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_karbon_emisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-carbon',
        HC_PLUGIN_URL . 'modules/motosiklet-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mcc-box">
        <h3>Motosiklet Karbon Emisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Ortalama Yakıt Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-mcc-cons" value="3.5">
        </div>
        <div class="hc-form-group">
            <label>Yıllık Kat Edilen Yol (km)</label>
            <input type="number" id="hc-mcc-km" value="5000">
        </div>
        <button class="hc-btn" onclick="hcMccHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mcc-result">
            <div class="hc-result-title">Yıllık CO2 Salınımı:</div>
            <div class="hc-result-value" id="hc-mcc-val">-</div>
            <div id="hc-mcc-tree" style="margin-top: 10px; font-size: 14px;"></div>
        </div>
    </div>
    <?php
}
