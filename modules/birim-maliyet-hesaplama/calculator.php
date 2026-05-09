<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birim_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birim-maliyet-hesaplama',
        HC_PLUGIN_URL . 'modules/birim-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birim-maliyet-css',
        HC_PLUGIN_URL . 'modules/birim-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-birim-maliyet-hesaplama">
        <h3>Birim Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bm-total">Toplam Üretim Maliyeti (TL)</label>
            <input type="number" id="hc-bm-total" placeholder="Örn: 50000">
        </div>

        <div class="hc-form-group">
            <label for="hc-bm-qty">Üretilen Miktar (Adet/Birim)</label>
            <input type="number" id="hc-bm-qty" placeholder="Örn: 1000">
        </div>
        
        <button class="hc-btn" onclick="hcBirimMaliyetHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-birim-maliyet-result">
            <div class="hc-result-item">
                <span>Toplam Gider:</span>
                <strong id="hc-bm-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Üretim Miktarı:</span>
                <strong id="hc-bm-res-qty">-</strong>
            </div>
            <div class="hc-result-value" id="hc-bm-res-unit">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Birim Başına Maliyet</p>
        </div>
    </div>
    <?php
}
