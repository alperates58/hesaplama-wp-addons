<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atik_su_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atik-su-hesaplama',
        HC_PLUGIN_URL . 'modules/atik-su-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atik-su-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atik-su-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atik-su-hesaplama">
        <h3>Atık Su Kirletici Yükü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ww-flow">Günlük Debi (m³/gün)</label>
            <input type="number" id="hc-ww-flow" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ww-bod">BOD₅ Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-ww-bod" placeholder="Örn: 250" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ww-cod">COD Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-ww-cod" placeholder="Örn: 450" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ww-ss">Askıda Katı Madde - SS (mg/L)</label>
            <input type="number" id="hc-ww-ss" placeholder="Örn: 200" step="any">
        </div>
        <button class="hc-btn" onclick="hcAtikSuYukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ww-result">
            <div class="hc-ww-grid">
                <div class="hc-ww-item">
                    <span class="hc-result-label">BOD₅ Yükü:</span>
                    <span class="hc-result-value" id="hc-ww-bod-val">-</span>
                    <span class="hc-ww-unit">kg/gün</span>
                </div>
                <div class="hc-ww-item">
                    <span class="hc-result-label">COD Yükü:</span>
                    <span class="hc-result-value" id="hc-ww-cod-val">-</span>
                    <span class="hc-ww-unit">kg/gün</span>
                </div>
                <div class="hc-ww-item">
                    <span class="hc-result-label">SS Yükü:</span>
                    <span class="hc-result-value" id="hc-ww-ss-val">-</span>
                    <span class="hc-ww-unit">kg/gün</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
