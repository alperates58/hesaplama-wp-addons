<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-emisyon',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-emisyon-css',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-emisyon">
        <h3>Elektrikli Araç Emisyon Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ev-dist">Kat Edilen Mesafe (km)</label>
            <input type="number" id="hc-ev-dist" placeholder="Örn: 100" min="1" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-eff">Araç Verimliliği (kWh/100km)</label>
            <input type="number" id="hc-ev-eff" placeholder="Örn: 18" min="10" value="18">
        </div>
        <button class="hc-btn" onclick="hcEvEmisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ev-emisyon-result">
            <div class="hc-result-item">
                <span>Şebeke Kaynaklı CO2:</span>
                <span class="hc-result-value" id="hc-res-ev-co2">0 kg</span>
            </div>
            <div class="hc-ev-compare">
                <p id="hc-res-ev-vs-ice">Benzinli bir araca göre %0 daha az emisyon.</p>
            </div>
        </div>
    </div>
    <?php
}
