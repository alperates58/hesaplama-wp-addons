<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piyasa_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mcap',
        HC_PLUGIN_URL . 'modules/piyasa-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mcap-css',
        HC_PLUGIN_URL . 'modules/piyasa-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mcap">
        <h3>Piyasa Değeri (Market Cap) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mc-price">Güncel Hisse Fiyatı (TL)</label>
            <input type="number" id="hc-mc-price" step="0.01" placeholder="Örn: 45.50">
        </div>

        <div class="hc-form-group">
            <label for="hc-mc-shares">Toplam Hisse Adedi</label>
            <input type="number" id="hc-mc-shares" placeholder="Şirketin toplam ödenmiş sermayesi">
        </div>
        
        <button class="hc-btn" onclick="hcPiyasaDegeriHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mcap-result">
            <div class="hc-result-value" id="hc-mc-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Piyasa Değeri (Market Cap)</p>
        </div>
    </div>
    <?php
}
