<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vickers_sertlik_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vickers-calc',
        HC_PLUGIN_URL . 'modules/vickers-sertlik-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vickers-calc-css',
        HC_PLUGIN_URL . 'modules/vickers-sertlik-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vickers-calc">
        <h3>Vickers Sertliği (HV)</h3>
        <div class="hc-form-group">
            <label for="hc-vc-force">Uygulanan Kuvvet (F) [kgf]</label>
            <input type="number" id="hc-vc-force" value="30" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vc-diag">Ortalama İz Köşegeni (d) [mm]</label>
            <input type="number" id="hc-vc-diag" value="0.5" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcVickersHesapla()">HV Değerini Hesapla</button>
        <div class="hc-result" id="hc-vickers-calc-result">
            <div class="hc-result-item">
                <span>Vickers Sertliği:</span>
                <span class="hc-result-value" id="hc-res-vc-val">0 HV</span>
            </div>
            <p class="hc-vc-note">HV = 1.854 * (F / d²)</p>
        </div>
    </div>
    <?php
}
