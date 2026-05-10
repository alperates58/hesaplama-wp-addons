<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_otobus_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-otobus-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/otobus-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-otobus-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/otobus-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bus-carbon">
        <h3>Otobüs Seyahati Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-bt-dist">Seyahat Mesafesi (km)</label>
            <input type="number" id="hc-bt-dist" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bt-type">Otobüs Tipi</label>
            <select id="hc-bt-type">
                <option value="0.03">Şehir İçi Belediye Otobüsü - 0.03 kg/km</option>
                <option value="0.05">Şehirler Arası Otobüs - 0.05 kg/km</option>
                <option value="0.02">Elektrikli Metrobüs / Otobüs - 0.02 kg/km</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOtobüsKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bt-result">
            <div class="hc-result-label">Kişi Başı Emisyon:</div>
            <div class="hc-result-value" id="hc-bt-val">-</div>
        </div>
    </div>
    <?php
}
