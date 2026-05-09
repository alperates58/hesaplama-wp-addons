<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-komisyon-css',
        HC_PLUGIN_URL . 'modules/komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-komisyon-hesaplama">
        <h3>Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kom-price">Satış Fiyatı (TL)</label>
            <input type="number" id="hc-kom-price" placeholder="Örn: 1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-kom-rate">Komisyon Oranı (%)</label>
            <input type="number" id="hc-kom-rate" placeholder="Örn: 10">
        </div>
        
        <button class="hc-btn" onclick="hcKomisyonHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-komisyon-result">
            <div class="hc-result-item">
                <span>Komisyon Tutarı:</span>
                <strong id="hc-kom-res-amount">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kom-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kazanç (Komisyon Sonrası)</p>
        </div>
    </div>
    <?php
}
