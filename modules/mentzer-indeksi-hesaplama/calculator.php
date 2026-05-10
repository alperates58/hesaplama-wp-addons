<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mentzer_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mentzer-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/mentzer-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mentzer-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mentzer-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mentzer-calc">
        <h3>Mentzer İndeksi</h3>
        <div class="hc-form-group">
            <label for="hc-mi-mcv">MCV (fL)</label>
            <input type="number" id="hc-mi-mcv" placeholder="Örn: 70">
        </div>
        <div class="hc-form-group">
            <label for="hc-mi-rbc">RBC (Alyuvar) (milyon/µL)</label>
            <input type="number" id="hc-mi-rbc" placeholder="Örn: 5.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcMentzerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mi-result">
            <div class="hc-result-label">İndeks Değeri:</div>
            <div class="hc-result-value" id="hc-mi-val">-</div>
            <p id="hc-mi-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
