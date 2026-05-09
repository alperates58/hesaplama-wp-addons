<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogalgaz-emisyon',
        HC_PLUGIN_URL . 'modules/dogalgaz-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogalgaz-emisyon-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogalgaz-emisyon">
        <h3>Doğalgaz Karbon Emisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gas-m3">Tüketilen Doğalgaz (m³)</label>
            <input type="number" id="hc-gas-m3" placeholder="Örn: 200" min="1">
        </div>
        <button class="hc-btn" onclick="hcDogalgazEmisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogalgaz-emisyon-result">
            <div class="hc-result-item">
                <span>Toplam CO2 Salınımı:</span>
                <span class="hc-result-value" id="hc-res-gas-m3-co2">0 kg</span>
            </div>
            <p id="hc-res-gas-m3-desc">Konutlarda ısınma ve pişirme amaçlı kullanım baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
