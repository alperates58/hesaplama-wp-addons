<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gayrimenkul_kapitalizasyon_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gayrimenkul-kapitalizasyon-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/gayrimenkul-kapitalizasyon-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gayrimenkul-kapitalizasyon-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gayrimenkul-kapitalizasyon-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gayrimenkul-kapitalizasyon-orani">
        <h3>Gayrimenkul Kapitalizasyon Oranı (Cap Rate)</h3>
        <div class="hc-form-group">
            <label for="hc-cr-noi">Yıllık Net İşletme Geliri (NOI - ₺)</label>
            <input type="number" id="hc-cr-noi" placeholder="Örn: 300.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-value">Gayrimenkulün Mevcut Piyasa Değeri (₺)</label>
            <input type="number" id="hc-cr-value" placeholder="Örn: 6.000.000">
        </div>
        <button class="hc-btn" onclick="hcGayrimenkulKapitalizasyonOraniHesapla()">Cap Rate Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <div class="hc-result-item">
                <span>Kapitalizasyon Oranı (Cap Rate):</span>
                <strong class="hc-result-value" id="hc-cr-output">-</strong>
            </div>
            <p class="hc-small-text">Cap Rate, yatırımın riskini ve getiri beklentisini yansıtır. Genellikle yüksek Cap Rate daha yüksek getiri ve risk anlamına gelir.</p>
        </div>
    </div>
    <?php
}
