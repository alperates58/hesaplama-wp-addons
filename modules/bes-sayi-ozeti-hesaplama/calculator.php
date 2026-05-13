<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bes_sayi_ozeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bes-sayi-ozeti-hesaplama',
        HC_PLUGIN_URL . 'modules/bes-sayi-ozeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bes-sayi-ozeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bes-sayi-ozeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-5num-summary">
        <h3>Beş Sayı Özeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-5n-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-5n-data" class="hc-input" placeholder="Örn: 10, 20, 35, 40, 50, 70, 90"></textarea>
        </div>
        <button class="hc-btn" onclick="hc5NumSummaryHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bes-sayi-ozeti-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Minimum:</span>
                    <strong id="hc-res-5n-min">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>1. Çeyrek (Q1):</span>
                    <strong id="hc-res-5n-q1">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Medyan (Q2):</span>
                    <strong id="hc-res-5n-med">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>3. Çeyrek (Q3):</span>
                    <strong id="hc-res-5n-q3">-</strong>
                </div>
                <div class="hc-result-item" style="grid-column: span 2;">
                    <span>Maksimum:</span>
                    <strong id="hc-res-5n-max">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
