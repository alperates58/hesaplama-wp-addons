<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hepsiburada_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hepsiburada-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/hepsiburada-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hepsiburada-komisyon-css',
        HC_PLUGIN_URL . 'modules/hepsiburada-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hepsiburada-komisyon-hesaplama">
        <h3>Hepsiburada Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hb-price">Satış Fiyatı (TL)</label>
            <input type="number" id="hc-hb-price" placeholder="Örn: 750">
        </div>

        <div class="hc-form-group">
            <label for="hc-hb-rate">Komisyon Oranı (%)</label>
            <input type="number" id="hc-hb-rate" placeholder="Örn: 15">
        </div>

        <div class="hc-form-group">
            <label for="hc-hb-shipping">Kargo Ücreti (TL)</label>
            <input type="number" id="hc-hb-shipping" placeholder="Örn: 35">
        </div>
        
        <button class="hc-btn" onclick="hcHepsiburadaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hepsiburada-result">
            <div class="hc-result-item">
                <span>Komisyon Tutarı:</span>
                <strong id="hc-hb-res-kom">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İşlem Bedeli:</span>
                <strong id="hc-hb-res-fee">-</strong>
            </div>
            <div class="hc-result-value" id="hc-hb-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Hakediş</p>
        </div>
    </div>
    <?php
}
