<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tren_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tren-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/tren-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tren-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tren-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-train-carbon">
        <h3>Tren Seyahati Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-tr-dist">Seyahat Mesafesi (km)</label>
            <input type="number" id="hc-tr-dist" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-type">Tren Tipi</label>
            <select id="hc-tr-type">
                <option value="0.015">Yüksek Hızlı Tren (Elektrikli) - 0.015 kg/km</option>
                <option value="0.035">Şehirler Arası Tren - 0.035 kg/km</option>
                <option value="0.025">Banliyö / Metro - 0.025 kg/km</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTrenKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tr-result">
            <div class="hc-result-label">Kişi Başı Emisyon:</div>
            <div class="hc-result-value" id="hc-tr-val">-</div>
        </div>
    </div>
    <?php
}
