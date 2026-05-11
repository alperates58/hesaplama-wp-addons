<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hepsiburada_komisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hepsiburada-komisyonu',
        HC_PLUGIN_URL . 'modules/hepsiburada-komisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hepsiburada-komisyonu-css',
        HC_PLUGIN_URL . 'modules/hepsiburada-komisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hepsiburada-komisyon">
        <h3>Hepsiburada Komisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hk-sale">Satış Fiyatı (₺)</label>
            <input type="number" id="hc-hk-sale" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-hk-comm">Komisyon Oranı (%)</label>
            <input type="number" id="hc-hk-comm" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-hk-ship">Kargo Ücreti (₺)</label>
            <input type="number" id="hc-hk-ship" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcHepsiburadaKomisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hk-result">
            <div class="hc-result-item">
                <span>Hepsiburada Komisyonu:</span>
                <strong id="hc-hk-res-comm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Elinize Geçecek Net:</span>
                <strong class="hc-result-value" id="hc-hk-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
