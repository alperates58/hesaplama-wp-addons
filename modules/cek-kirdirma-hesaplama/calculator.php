<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cek_kirdirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cek-kirdirma',
        HC_PLUGIN_URL . 'modules/cek-kirdirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cek-kirdirma-css',
        HC_PLUGIN_URL . 'modules/cek-kirdirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cek-kirdirma-hesaplama">
        <h3>Çek Kırdırma Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ck-amount">Çek Tutarı (TL)</label>
            <input type="number" id="hc-ck-amount" placeholder="Örn: 50000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ck-days">Vadeye Kalan Gün</label>
            <input type="number" id="hc-ck-days" placeholder="Örn: 60">
        </div>

        <div class="hc-form-group">
            <label for="hc-ck-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-ck-rate" value="48">
        </div>

        <div class="hc-form-group">
            <label for="hc-ck-comm">Banka Komisyonu (%)</label>
            <input type="number" id="hc-ck-comm" value="1.5" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCekKirdirmaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cek-kirdirma-result">
            <div class="hc-result-item">
                <span>İskonto (Faiz):</span>
                <strong id="hc-ck-res-discount">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Komisyon Tutarı:</span>
                <strong id="hc-ck-res-comm">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ck-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Ele Geçecek Net Tutar</p>
        </div>
    </div>
    <?php
}
