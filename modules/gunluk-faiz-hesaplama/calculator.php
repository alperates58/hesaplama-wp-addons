<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-daily-interest',
        HC_PLUGIN_URL . 'modules/gunluk-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-daily-interest-css',
        HC_PLUGIN_URL . 'modules/gunluk-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-daily-interest">
        <h3>Günlük Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gi-principal">Yatırılan Tutar (TL)</label>
            <input type="number" id="hc-gi-principal" placeholder="Anapara">
        </div>

        <div class="hc-form-group">
            <label for="hc-gi-rate">Yıllık Brüt Faiz Oranı (%)</label>
            <input type="number" id="hc-gi-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gi-days">Gün Sayısı</label>
            <input type="number" id="hc-gi-days" value="32">
        </div>

        <div class="hc-form-group">
            <label for="hc-gi-tax">Stopaj Oranı (%)</label>
            <input type="number" id="hc-gi-tax" value="5">
            <small>Vadeye göre %5, %7.5 veya %10 olabilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcGunlukFaizHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-daily-interest-result">
            <div class="hc-result-item">
                <span>Brüt Faiz:</span>
                <strong id="hc-gi-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Getiri:</span>
                <strong id="hc-gi-res-net">-</strong>
            </div>
            <div class="hc-result-value" id="hc-gi-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vade Sonu Toplam Tutar</p>
        </div>
    </div>
    <?php
}
