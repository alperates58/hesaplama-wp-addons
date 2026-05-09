<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elisa_konsantrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elisa-konsantrasyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/elisa-konsantrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elisa-konsantrasyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/elisa-konsantrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elisa-konsantrasyonu-hesaplama">
        <h3>ELISA Konsantrasyonu Hesaplama</h3>
        <p style="font-size: 0.85em; margin-bottom: 15px; opacity: 0.8;">Standart eğri denkleminizi (y = mx + b) giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-elisa-m">Eğim (m)</label>
            <input type="number" id="hc-elisa-m" placeholder="Örn: 0.45" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-elisa-b">Kesişim (b)</label>
            <input type="number" id="hc-elisa-b" placeholder="Örn: 0.05" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-elisa-abs">Örnek Absorbansı (y)</label>
            <input type="number" id="hc-elisa-abs" placeholder="Örn: 0.85" step="any">
        </div>
        <button class="hc-btn" onclick="hcELISAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-elisa-result">
            <div class="hc-result-label">Hesaplanan Konsantrasyon (x):</div>
            <div class="hc-result-value" id="hc-elisa-val">-</div>
            <div class="hc-result-note">x = (y - b) / m</div>
        </div>
    </div>
    <?php
}
