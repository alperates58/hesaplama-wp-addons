<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_e_okul_not_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eokul-not',
        HC_PLUGIN_URL . 'modules/e-okul-not-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eokul-calc">
        <h3>E-Okul Ders Notu Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Sınav</label>
            <input type="number" class="hc-eo-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>2. Sınav</label>
            <input type="number" class="hc-eo-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>1. Performans / Sözlü</label>
            <input type="number" class="hc-eo-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>2. Performans / Proje</label>
            <input type="number" class="hc-eo-score" placeholder="0-100">
        </div>
        <button class="hc-btn" onclick="hcEokulNotHesapla()">Ortalamayı Hesapla</button>
        <div class="hc-result" id="hc-eo-result">
            <div class="hc-result-title">Ders Ortalaması:</div>
            <div class="hc-result-value" id="hc-eo-val">-</div>
        </div>
    </div>
    <?php
}
