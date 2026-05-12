<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_kafein_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-caffeine-effect-js',
        HC_PLUGIN_URL . 'modules/kahve-kafein-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-caffeine-effect-css',
        HC_PLUGIN_URL . 'modules/kahve-kafein-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-caffeine-effect">
        <h3>Kahve Kafein Etkisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ce-amount">Tüketilen Kafein (mg)</label>
            <input type="number" id="hc-ce-amount" placeholder="Örn: 95 (1 kupa kahve)" value="95">
        </div>

        <div class="hc-form-group">
            <label for="hc-ce-hours">Tüketimden Sonra Geçen Süre (Saat)</label>
            <input type="number" id="hc-ce-hours" placeholder="Saat" value="0" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcKafeinEtkisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-caffeine-effect-result">
            <div class="hc-result-item">
                <span>Kanda Kalan Tahmini Kafein:</span>
                <strong class="hc-result-value" id="hc-ce-val">-</strong>
            </div>
            <div class="hc-ce-chart">
                <div class="hc-ce-bar" id="hc-ce-bar"></div>
            </div>
            <div class="hc-result-note" id="hc-ce-note"></div>
        </div>
    </div>
    <?php
}
