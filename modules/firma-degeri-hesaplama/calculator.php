<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_firma_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-firma-degeri',
        HC_PLUGIN_URL . 'modules/firma-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-firma-degeri-css',
        HC_PLUGIN_URL . 'modules/firma-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-firma-degeri">
        <h3>Firma Değeri (Enterprise Value) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fd-mcap">Piyasa Değeri (TL)</label>
            <input type="number" id="hc-fd-mcap" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-fd-debt">Toplam Borç (TL)</label>
            <input type="number" id="hc-fd-debt" placeholder="Kısa + Uzun Vadeli Borç">
        </div>

        <div class="hc-form-group">
            <label for="hc-fd-cash">Nakit ve Benzerleri (TL)</label>
            <input type="number" id="hc-fd-cash" placeholder="Kasa + Banka">
        </div>
        
        <button class="hc-btn" onclick="hcFirmaDegeriHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-firma-degeri-result">
            <div class="hc-result-item">
                <span>Net Borç:</span>
                <strong id="hc-fd-res-netdebt">-</strong>
            </div>
            <div class="hc-result-value" id="hc-fd-res-ev">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Firma Değeri (Enterprise Value)</p>
        </div>
    </div>
    <?php
}
