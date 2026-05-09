<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vadeli_cek_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vadeli-cek',
        HC_PLUGIN_URL . 'modules/vadeli-cek-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vadeli-cek-css',
        HC_PLUGIN_URL . 'modules/vadeli-cek-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vadeli-cek-hesaplama">
        <h3>Vadeli Çek Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vc-amount">Çek Tutarı (TL)</label>
            <input type="number" id="hc-vc-amount" placeholder="Çekin üzerindeki rakam">
        </div>

        <div class="hc-form-group">
            <label for="hc-vc-days">Vadeye Kalan Gün</label>
            <input type="number" id="hc-vc-days" placeholder="Örn: 90">
        </div>

        <div class="hc-form-group">
            <label for="hc-vc-rate">Yıllık İskonto Oranı (%)</label>
            <input type="number" id="hc-vc-rate" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcVadeliCekHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-vadeli-cek-result">
            <div class="hc-result-item">
                <span>İskonto Tutarı:</span>
                <strong id="hc-vc-res-discount">-</strong>
            </div>
            <div class="hc-result-value" id="hc-vc-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Çekin Bugünkü Peşin Değeri</p>
        </div>
    </div>
    <?php
}
