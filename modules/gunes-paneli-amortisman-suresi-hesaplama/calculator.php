<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_amortisman_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-payback',
        HC_PLUGIN_URL . 'modules/gunes-paneli-amortisman-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-payback-css',
        HC_PLUGIN_URL . 'modules/gunes-paneli-amortisman-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-payback">
        <h3>Güneş Paneli Amortisman Süresi</h3>
        
        <div class="hc-form-group">
            <label for="hc-sp-investment">Toplam Yatırım Tutarı (₺)</label>
            <input type="number" id="hc-sp-investment" placeholder="Örn: 250.000" step="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-kwh-year">Yıllık Tahmini Üretim (kWh)</label>
            <input type="number" id="hc-sp-kwh-year" placeholder="Örn: 7.500" step="100">
            <small>1 kWp sistem Türkiye'de yılda ortalama 1.400-1.600 kWh üretir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-elec-price">Güncel Elektrik Birim Fiyatı (₺/kWh)</label>
            <input type="number" id="hc-sp-elec-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcAmortismanHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sp-result">
            <div class="hc-result-item">
                <span>1. Yıl Toplam Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-sp-y1">-</span>
            </div>
            <div class="hc-result-item">
                <span>Amortisman Süresi:</span>
                <span class="hc-result-value highlight" id="hc-res-sp-years">-</span>
            </div>
            <div class="hc-result-note">
                * Panel verim kaybı (%0.5/yıl) ve elektrik fiyat artışı (%10/yıl) hesaba katılmıştır.
            </div>
        </div>
    </div>
    <?php
}
