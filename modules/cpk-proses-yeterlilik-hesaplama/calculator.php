<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cpk_proses_yeterlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cpk-proses-yeterlilik-hesaplama',
        HC_PLUGIN_URL . 'modules/cpk-proses-yeterlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cpk-proses-yeterlilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cpk-proses-yeterlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cpk-calc">
        <h3>Cpk Proses Yeterlilik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cpk-usl">Üst Tolerans Sınırı (USL):</label>
            <input type="number" id="hc-cpk-usl" class="hc-input" placeholder="Örn: 10.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cpk-lsl">Alt Tolerans Sınırı (LSL):</label>
            <input type="number" id="hc-cpk-lsl" class="hc-input" placeholder="Örn: 9.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cpk-mean">Proses Ortalaması (μ):</label>
            <input type="number" id="hc-cpk-mean" class="hc-input" placeholder="Örn: 10.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cpk-sigma">Standart Sapma (σ):</label>
            <input type="number" id="hc-cpk-sigma" class="hc-input" placeholder="Örn: 0.12" step="any">
        </div>
        <button class="hc-btn" onclick="hcCpkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cpk-proses-yeterlilik-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Cpk Değeri:</span>
                    <strong id="hc-res-cpk-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Durum:</span>
                    <strong id="hc-res-cpk-status">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Cpu (Üst):</span>
                    <strong id="hc-res-cpu">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Cpl (Alt):</span>
                    <strong id="hc-res-cpl">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
