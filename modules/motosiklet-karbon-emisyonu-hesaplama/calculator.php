<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-motosiklet-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/motosiklet-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-motosiklet-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/motosiklet-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moto-carbon">
        <h3>Motosiklet Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-mc-dist">Haftalık Mesafe (km)</label>
            <input type="number" id="hc-mc-dist" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-mc-size">Motor Hacmi</label>
            <select id="hc-mc-size">
                <option value="0.07">Küçük ( < 125cc ) - 0.07 kg/km</option>
                <option value="0.09" selected>Orta ( 125cc - 500cc ) - 0.09 kg/km</option>
                <option value="0.13">Büyük ( > 500cc ) - 0.13 kg/km</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMotosikletKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mc-result">
            <div class="hc-result-label">Yıllık Emisyon:</div>
            <div class="hc-result-value" id="hc-mc-val">-</div>
        </div>
    </div>
    <?php
}
