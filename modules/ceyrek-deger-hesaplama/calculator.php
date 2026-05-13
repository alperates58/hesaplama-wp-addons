<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceyrek_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ceyrek-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/ceyrek-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ceyrek-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ceyrek-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-quartiles">
        <h3>Çeyrek Değerler (Quartiles)</h3>
        <div class="hc-form-group">
            <label for="hc-q-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-q-data" class="hc-input" placeholder="Örn: 5, 10, 15, 20, 25, 30, 35, 40"></textarea>
        </div>
        <button class="hc-btn" onclick="hcQuartilesHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ceyrek-deger-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Minimum:</span>
                    <strong id="hc-res-q-min">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>1. Çeyrek (Q1):</span>
                    <strong id="hc-res-q1">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Medyan (Q2):</span>
                    <strong id="hc-res-q2">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>3. Çeyrek (Q3):</span>
                    <strong id="hc-res-q3">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Maksimum:</span>
                    <strong id="hc-res-q-max">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
