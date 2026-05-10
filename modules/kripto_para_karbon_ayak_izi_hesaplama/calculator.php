<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_para_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-para-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/kripto_para_karbon_ayak_izi_hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-para-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kripto_para_karbon_ayak_izi_hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-crypto-carbon">
        <h3>Kripto Para Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-cc-type">Kripto Para Tipi / İşlem</label>
            <select id="hc-cc-type">
                <option value="400">Bitcoin İşlemi (Başına ~400 kg CO2)</option>
                <option value="0.02">Ethereum (PoS) İşlemi (Başına ~0.02 kg CO2)</option>
                <option value="0.5">Madencilik (Aylık 1 Rig - ~0.5 Ton CO2)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-count">İşlem / Cihaz Sayısı</label>
            <input type="number" id="hc-cc-count" value="1">
        </div>
        <button class="hc-btn" onclick="hcKriptoParaKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cc-result">
            <div class="hc-result-label">Tahmini Emisyon:</div>
            <div class="hc-result-value" id="hc-cc-val">-</div>
        </div>
    </div>
    <?php
}
