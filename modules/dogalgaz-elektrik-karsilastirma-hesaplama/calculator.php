<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_elektrik_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gas-vs-elec',
        HC_PLUGIN_URL . 'modules/dogalgaz-elektrik-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gas-vs-elec-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-elektrik-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gas-vs-elec">
        <h3>Doğalgaz - Elektrik Karşılaştırma</h3>
        
        <div class="hc-form-group">
            <label for="hc-ge-energy">İhtiyaç Duyulan Enerji (kWh)</label>
            <input type="number" id="hc-ge-energy" value="100" step="1">
            <small>Karşılaştırma için baz alınacak enerji miktarı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-gas-price">Doğalgaz Fiyatı (₺/m³)</label>
            <input type="number" id="hc-ge-gas-price" value="9.50" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-elec-price">Elektrik Fiyatı (₺/kWh)</label>
            <input type="number" id="hc-ge-elec-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcGazElekKarsilastir()">Karşılaştır</button>

        <div class="hc-result" id="hc-ge-result">
            <div class="hc-result-item">
                <span>Doğalgaz İle Maliyet:</span>
                <span class="hc-result-value" id="hc-res-ge-gas">-</span>
            </div>
            <div class="hc-result-item">
                <span>Elektrik İle Maliyet:</span>
                <span class="hc-result-value" id="hc-res-ge-elec">-</span>
            </div>
            <div class="hc-result-note highlight" id="hc-res-ge-note">
                -
            </div>
        </div>
    </div>
    <?php
}
