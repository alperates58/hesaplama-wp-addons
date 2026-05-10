<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saksi_topragi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pot-soil',
        HC_PLUGIN_URL . 'modules/saksi-topragi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pot-soil-css',
        HC_PLUGIN_URL . 'modules/saksi-topragi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pot-soil">
        <h3>Saksı Toprağı Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-ps-type">Saksı Şekli:</label>
            <select id="hc-ps-type">
                <option value="cylinder">Silindir / Standart Yuvarlak</option>
                <option value="box">Kare / Dikdörtgen</option>
            </select>
        </div>
        <div id="hc-ps-cyl-inputs">
            <div class="hc-form-group">
                <label for="hc-ps-dia">Üst Çap (cm):</label>
                <input type="number" id="hc-ps-dia" placeholder="30">
            </div>
            <div class="hc-form-group">
                <label for="hc-ps-height">Yükseklik (cm):</label>
                <input type="number" id="hc-ps-height" placeholder="25">
            </div>
        </div>
        <button class="hc-btn" onclick="hcPotSoilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pot-soil-result">
            <strong>Gereken Toprak:</strong>
            <div id="hc-ps-res-val" class="hc-result-value">-</div>
            <span>Litre</span>
        </div>
    </div>
    <?php
}
