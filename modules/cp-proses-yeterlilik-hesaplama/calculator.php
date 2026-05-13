<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cp_proses_yeterlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cp-proses-yeterlilik-hesaplama',
        HC_PLUGIN_URL . 'modules/cp-proses-yeterlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cp-proses-yeterlilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cp-proses-yeterlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cp-calc">
        <h3>Cp Proses Yeterlilik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cp-usl">Üst Tolerans Sınırı (USL):</label>
            <input type="number" id="hc-cp-usl" class="hc-input" placeholder="Örn: 50.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-lsl">Alt Tolerans Sınırı (LSL):</label>
            <input type="number" id="hc-cp-lsl" class="hc-input" placeholder="Örn: 49.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-sigma">Standart Sapma (σ):</label>
            <input type="number" id="hc-cp-sigma" class="hc-input" placeholder="Örn: 0.1" step="any">
        </div>
        <button class="hc-btn" onclick="hcCpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cp-proses-yeterlilik-hesaplama-result">
            <div class="hc-result-label">Potansiyel Yeterlilik (Cp):</div>
            <div class="hc-result-value" id="hc-res-cp-val">-</div>
            <p id="hc-res-cp-status" style="margin-top:10px; font-weight:bold;"></p>
            <p style="margin-top:5px; font-size:0.8em; color:#666;">Not: Cp değeri sadece dağılımın genişliğini ölçer, merkezlenmeyi dikkate almaz.</p>
        </div>
    </div>
    <?php
}
