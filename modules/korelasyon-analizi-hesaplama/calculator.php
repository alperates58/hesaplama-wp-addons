<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_korelasyon_analizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-korelasyon-analizi-hesaplama',
        HC_PLUGIN_URL . 'modules/korelasyon-analizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-korelasyon-analizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/korelasyon-analizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-korelasyon-analizi">
        <h3>Korelasyon Analizi (Pearson r & Anlamlılık)</h3>
        <div class="hc-form-group">
            <label for="hc-ana-x">X Veri Seti:</label>
            <textarea id="hc-ana-x" class="hc-input" placeholder="Örn: 10, 20, 30, 40, 50"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-ana-y">Y Veri Seti:</label>
            <textarea id="hc-ana-y" class="hc-input" placeholder="Örn: 12, 24, 33, 45, 58"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKorelasyonAnaliziHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-korelasyon-analizi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Korelasyon (r):</span>
                    <strong id="hc-res-ana-r">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>T-İstatistiği:</span>
                    <strong id="hc-res-ana-t">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>P-Değeri:</span>
                    <strong id="hc-res-ana-p">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Anlamlılık:</span>
                    <strong id="hc-res-ana-sig">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
