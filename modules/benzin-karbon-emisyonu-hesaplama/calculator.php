<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_benzin_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-benzin-emisyon',
        HC_PLUGIN_URL . 'modules/benzin-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-benzin-emisyon-css',
        HC_PLUGIN_URL . 'modules/benzin-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-benzin-emisyon">
        <h3>Benzin Karbon Emisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gas-liters">Tüketilen Benzin (Litre)</label>
            <input type="number" id="hc-gas-liters" placeholder="Örn: 50" min="0.1" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBenzinEmisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-benzin-emisyon-result">
            <div class="hc-result-item">
                <span>Toplam CO2 Salınımı:</span>
                <span class="hc-result-value" id="hc-res-gas-co2">0 kg</span>
            </div>
            <p id="hc-res-gas-desc">Bu miktar yaklaşık 0 km yol kat eden bir araca eşdeğerdir.</p>
        </div>
    </div>
    <?php
}
