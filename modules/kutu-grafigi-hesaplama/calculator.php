<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutu_grafigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutu-grafigi-hesaplama',
        HC_PLUGIN_URL . 'modules/kutu-grafigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutu-grafigi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutu-grafigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kutu-grafigi">
        <h3>Kutu Grafiği (Box Plot) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-box-input">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-box-input" class="hc-input" placeholder="Örn: 5, 7, 8, 12, 15, 18, 22, 25"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKutuGrafigiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kutu-grafigi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Minimum:</span>
                    <strong id="hc-res-box-min">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>1. Çeyrek (Q1):</span>
                    <strong id="hc-res-box-q1">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Medyan (Q2):</span>
                    <strong id="hc-res-box-q2">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>3. Çeyrek (Q3):</span>
                    <strong id="hc-res-box-q3">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Maksimum:</span>
                    <strong id="hc-res-box-max">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Ç.A. (IQR):</span>
                    <strong id="hc-res-box-iqr">-</strong>
                </div>
            </div>
            <div style="margin-top: 15px;">
                <span>Aykırı Değerler:</span>
                <strong id="hc-res-box-outliers" style="color: #e74c3c;">-</strong>
            </div>
        </div>
    </div>
    <?php
}
