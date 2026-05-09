<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_telefon_sarj_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-phone-charge',
        HC_PLUGIN_URL . 'modules/telefon-sarj-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-phone-charge-css',
        HC_PLUGIN_URL . 'modules/telefon-sarj-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-phone-charge">
        <h3>Telefon Şarj Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-phone-batt">Batarya Kapasitesi (mAh)</label>
            <input type="number" id="hc-phone-batt" value="5000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-phone-freq">Günlük Şarj Sayısı</label>
            <input type="number" id="hc-phone-freq" value="1" min="0.1" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPhoneChargeHesapla()">Maliyet Hesapla</button>
        <div class="hc-result" id="hc-phone-charge-result">
            <div class="hc-result-item">
                <span>Yıllık Maliyet:</span>
                <span class="hc-result-value" id="hc-res-charge-total">0 TL</span>
            </div>
            <p class="hc-charge-note"> Projeksiyon 2026: 1 kWh = 3.50 ₺</p>
        </div>
    </div>
    <?php
}
