<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_emisyon_co2_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-co2-tax-calc',
        HC_PLUGIN_URL . 'modules/karbon-emisyonu-co2-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ctx-box">
        <h3>Karbon Emisyon Vergisi Tahmini</h3>
        <div class="hc-form-group">
            <label>Emisyon Değeri (g/km)</label>
            <input type="number" id="hc-ctx-gkm" placeholder="Örn: 165">
        </div>
        <button class="hc-btn" onclick="hcCtxHesapla()">Vergiyi Hesapla</button>
        <div class="hc-result" id="hc-ctx-result">
            <div class="hc-result-title">Tahmini Yıllık Ek Vergi:</div>
            <div class="hc-result-value" id="hc-ctx-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Bu hesaplama Avrupa standartları baz alınarak hazırlanmış bir projeksiyondur.</p>
        </div>
    </div>
    <?php
}
