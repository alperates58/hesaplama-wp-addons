<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dizel_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dizel-emisyon',
        HC_PLUGIN_URL . 'modules/dizel-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dizel-emisyon-css',
        HC_PLUGIN_URL . 'modules/dizel-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dizel-emisyon">
        <h3>Dizel Karbon Emisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-diesel-liters">Tüketilen Dizel (Litre)</label>
            <input type="number" id="hc-diesel-liters" placeholder="Örn: 50" min="0.1" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcDizelEmisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dizel-emisyon-result">
            <div class="hc-result-item">
                <span>Toplam CO2 Salınımı:</span>
                <span class="hc-result-value" id="hc-res-diesel-co2">0 kg</span>
            </div>
            <p id="hc-res-diesel-desc">Dizel yakıt, benzine göre litre başına daha fazla karbon salınımı yapmaktadır.</p>
        </div>
    </div>
    <?php
}
