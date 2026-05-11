<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_proses_yeterlilik_cp_cpk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cp-cpk',
        HC_PLUGIN_URL . 'modules/proses-yeterlilik-cp-cpk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cp-cpk-css',
        HC_PLUGIN_URL . 'modules/proses-yeterlilik-cp-cpk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cp-cpk">
        <h3>Proses Yeterlilik (Cp & Cpk) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cp-usl">Üst Tolerans Limiti (USL)</label>
            <input type="number" id="hc-cp-usl" placeholder="Üst limit" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-lsl">Alt Tolerans Limiti (LSL)</label>
            <input type="number" id="hc-cp-lsl" placeholder="Alt limit" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-mean">Süreç Ortalaması (μ)</label>
            <input type="number" id="hc-cp-mean" placeholder="Ortalama" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-sigma">Standart Sapma (σ)</label>
            <input type="number" id="hc-cp-sigma" placeholder="Sapma" step="any">
        </div>

        <button class="hc-btn" onclick="hcCpCpkHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-cp-result">
            <div class="hc-result-grid">
                <div class="hc-result-card">
                    <span class="hc-result-label">Cp (Potansiyel Yeterlilik)</span>
                    <span class="hc-result-value" id="hc-cp-res-cp">--</span>
                </div>
                <div class="hc-result-card">
                    <span class="hc-result-label">Cpk (Gerçek Yeterlilik)</span>
                    <span class="hc-result-value" id="hc-cp-res-cpk">--</span>
                </div>
            </div>
            <p id="hc-cp-status" style="text-align:center; font-weight:600; margin-top:15px;"></p>
        </div>
    </div>
    <?php
}
