<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_proses_yeterlilik_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-proses-yeterlilik-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/proses-yeterlilik-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-proses-yeterlilik-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/proses-yeterlilik-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-proses-yeterlilik-indeksi-hesaplama">
        <h3>Proses Yeterlilik İndeksi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cp-usl">Üst Spesifikasyon Limiti (USL)</label>
            <input type="number" id="hc-cp-usl" step="any" placeholder="Örn: 10.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-lsl">Alt Spesifikasyon Limiti (LSL)</label>
            <input type="number" id="hc-cp-lsl" step="any" placeholder="Örn: 9.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-mean">Proses Ortalaması (μ)</label>
            <input type="number" id="hc-cp-mean" step="any" placeholder="Örn: 10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-sigma">Standart Sapma (σ)</label>
            <input type="number" id="hc-cp-sigma" step="any" placeholder="Örn: 0.1">
        </div>
        <button class="hc-btn" onclick="hcProsesYeterlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-proses-yeterlilik-indeksi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Cp:</span>
                    <span class="hc-value" id="hc-res-cp">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Cpk:</span>
                    <span class="hc-value" id="hc-res-cpk">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Cpu:</span>
                    <span class="hc-value" id="hc-res-cpu">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Cpl:</span>
                    <span class="hc-value" id="hc-res-cpl">-</span>
                </div>
            </div>
            <div id="hc-cp-comment" style="margin-top:15px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
