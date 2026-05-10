<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lpg_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lpg-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/lpg-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lpg-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lpg-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lpg-carbon">
        <h3>LPG Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-lpg-amount">LPG Miktarı (Litre)</label>
            <input type="number" id="hc-lpg-amount" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcLPGKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lpg-result">
            <div class="hc-result-label">Toplam Emisyon:</div>
            <div class="hc-result-value" id="hc-lpg-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*1 Litre LPG yaklaşık 1.51 kg CO₂e salınımı yapar.</p>
        </div>
    </div>
    <?php
}
