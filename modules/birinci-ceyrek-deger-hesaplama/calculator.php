<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birinci_ceyrek_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birinci-ceyrek-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/birinci-ceyrek-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birinci-ceyrek-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/birinci-ceyrek-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-q1-calc">
        <h3>Birinci Çeyrek Değer (Q1) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-q1-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-q1-data" class="hc-input" placeholder="Örn: 10, 25, 45, 60, 80"></textarea>
        </div>
        <button class="hc-btn" onclick="hcQ1Hesapla()">Q1 Hesapla</button>
        <div class="hc-result" id="hc-birinci-ceyrek-deger-hesaplama-result">
            <div class="hc-result-label">1. Çeyrek Değer (Q1):</div>
            <div class="hc-result-value" id="hc-res-q1-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Veriler küçükten büyüğe sıralanarak %25'lik kesim noktası hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
