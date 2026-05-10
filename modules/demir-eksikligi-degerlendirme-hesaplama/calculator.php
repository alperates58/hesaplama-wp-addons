<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_demir_eksikligi_degerlendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-demir-eksikligi-degerlendirme-hesaplama',
        HC_PLUGIN_URL . 'modules/demir-eksikligi-degerlendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-demir-eksikligi-degerlendirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/demir-eksikligi-degerlendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iron-deficit">
        <h3>Demir Eksikliği (Ganzoni)</h3>
        <div class="hc-form-group">
            <label for="hc-id-w">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-id-w" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-id-hb">Güncel Hemoglobin (g/dL)</label>
            <input type="number" id="hc-id-hb" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-id-target">Hedef Hemoglobin (g/dL)</label>
            <input type="number" id="hc-id-target" value="14">
        </div>
        <button class="hc-btn" onclick="hcDemirEksikliğiHesapla()">Açığı Hesapla</button>
        <div class="hc-result" id="hc-id-result">
            <div class="hc-result-label">Toplam Demir Açığı:</div>
            <div class="hc-result-value" id="hc-id-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Ganzoni Formülü: Kilo * (Hedef Hb - Güncel Hb) * 2.4 + Depo (500mg)</p>
        </div>
    </div>
    <?php
}
