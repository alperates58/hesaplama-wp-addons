<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bahce_topragi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bahce-topragi-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/bahce-topragi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bahce-topragi-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bahce-topragi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bahce-topragi-miktari-hesaplama">
        <h3>Bahçe Toprağı Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bt-area">Alan (m²)</label>
            <input type="number" id="hc-bt-area" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bt-depth">Derinlik (cm)</label>
            <input type="number" id="hc-bt-depth" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bt-density">Toprak Yoğunluğu (ton/m³ - opsiyonel)</label>
            <input type="number" id="hc-bt-density" placeholder="Varsayılan: 1.3" step="0.1" value="1.3">
        </div>
        <button class="hc-btn" onclick="hcBahceTopragiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bt-result">
            <div class="hc-bt-grid">
                <div class="hc-bt-item">
                    <span class="hc-result-label">Gerekli Hacim:</span>
                    <span class="hc-result-value" id="hc-bt-vol">-</span>
                </div>
                <div class="hc-bt-item">
                    <span class="hc-result-label">Tahmini Ağırlık:</span>
                    <span class="hc-result-value" id="hc-bt-weight">-</span>
                </div>
            </div>
            <div class="hc-result-note" id="hc-bt-note"></div>
        </div>
    </div>
    <?php
}
