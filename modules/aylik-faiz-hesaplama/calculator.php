<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aylik_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-monthly-interest',
        HC_PLUGIN_URL . 'modules/aylik-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-monthly-interest-css',
        HC_PLUGIN_URL . 'modules/aylik-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-monthly-interest">
        <h3>Aylık Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mi-principal">Yatırılan Tutar (TL)</label>
            <input type="number" id="hc-mi-principal" placeholder="Anapara">
        </div>

        <div class="hc-form-group">
            <label for="hc-mi-rate">Yıllık Brüt Faiz Oranı (%)</label>
            <input type="number" id="hc-mi-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mi-months">Vade (Ay)</label>
            <input type="number" id="hc-mi-months" value="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mi-tax">Stopaj Oranı (%)</label>
            <input type="number" id="hc-mi-tax" value="5">
        </div>
        
        <button class="hc-btn" onclick="hcAylikFaizHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-monthly-interest-result">
            <div class="hc-result-item">
                <span>Brüt Faiz:</span>
                <strong id="hc-mi-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Getiri:</span>
                <strong id="hc-mi-res-net">-</strong>
            </div>
            <div class="hc-result-value" id="hc-mi-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vade Sonu Toplam Tutar</p>
        </div>
    </div>
    <?php
}
