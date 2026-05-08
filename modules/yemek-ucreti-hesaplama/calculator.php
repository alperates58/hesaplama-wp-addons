<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yemek-ucreti',
        HC_PLUGIN_URL . 'modules/yemek-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yemek-ucreti-css',
        HC_PLUGIN_URL . 'modules/yemek-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yemek-ucreti-hesaplama">
        <h3>Yemek Ücreti Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ye-daily">Günlük Yemek Bedeli (TL)</label>
            <input type="number" id="hc-ye-daily" value="330">
        </div>

        <div class="hc-form-group">
            <label for="hc-ye-days">Çalışılan Gün Sayısı</label>
            <input type="number" id="hc-ye-days" value="22">
        </div>
        
        <button class="hc-btn" onclick="hcYemekHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-yemek-result">
            <div class="hc-result-item">
                <span>Vergi İstisnası (Günlük):</span>
                <strong>300,00 ₺</strong>
            </div>
            <div class="hc-result-item">
                <span>SGK İstisnası (Günlük):</span>
                <strong>158,00 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-ye-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Toplam Yemek Yardımı</p>
        </div>
    </div>
    <?php
}
