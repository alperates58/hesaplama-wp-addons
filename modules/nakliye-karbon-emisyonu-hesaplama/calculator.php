<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nakliye_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nakliye-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/nakliye-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nakliye-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nakliye-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freight">
        <h3>Nakliye Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-fr-weight">Yük Ağırlığı (Ton)</label>
            <input type="number" id="hc-fr-weight" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-dist">Mesafe (km)</label>
            <input type="number" id="hc-fr-dist" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-type">Araç Tipi</label>
            <select id="hc-fr-type">
                <option value="0.10">Hafif Ticari ( < 3.5t ) - 0.10 kg/km</option>
                <option value="0.08">Kamyon ( 3.5t - 33t ) - 0.08 kg/ton-km</option>
                <option value="0.06">Tır / Ağır Vasıta ( > 33t ) - 0.06 kg/ton-km</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcNakliyeKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fr-result">
            <div class="hc-result-label">Toplam Emisyon:</div>
            <div class="hc-result-value" id="hc-fr-val">-</div>
        </div>
    </div>
    <?php
}
