<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_havalandirma_co2_seviyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-havalandirma-co2-seviyesi-hesaplama',
        HC_PLUGIN_URL . 'modules/havalandirma-co2-seviyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-havalandirma-co2-seviyesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/havalandirma-co2-seviyesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-co2-vent">
        <h3>Havalandırma CO₂ Seviyesi</h3>
        <div class="hc-form-group">
            <label for="hc-co-persons">Kişi Sayısı</label>
            <input type="number" id="hc-co-persons" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-co-area">Oda Hacmi (m³)</label>
            <input type="number" id="hc-co-area" placeholder="En x Boy x Yükseklik" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-co-rate">Havalandırma Debisi (m³/saat)</label>
            <input type="number" id="hc-co-rate" value="30">
            <small>Kişi başı min. 25-30 m³/saat önerilir.</small>
        </div>
        <button class="hc-btn" onclick="hcHavalandırmaCO2SeviyesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-co-result">
            <div class="hc-result-label">Tahmini CO₂ Konsantrasyonu:</div>
            <div class="hc-result-value" id="hc-co-val">-</div>
            <p id="hc-co-status" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
