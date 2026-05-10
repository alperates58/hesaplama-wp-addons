<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klorofil_icerigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chlo-calc',
        HC_PLUGIN_URL . 'modules/klorofil-icerigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-chlo-calc-css',
        HC_PLUGIN_URL . 'modules/klorofil-icerigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-chlo-calc">
        <h3>Klorofil İçeriği (Arnon Metodu)</h3>
        <div class="hc-form-group">
            <label for="hc-cl-a663">A663 (Absorbans):</label>
            <input type="number" id="hc-cl-a663" step="0.001" placeholder="0.500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-a645">A645 (Absorbans):</label>
            <input type="number" id="hc-cl-a645" step="0.001" placeholder="0.300">
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-weight">Örnek Taze Ağırlığı (g):</label>
            <input type="number" id="hc-cl-weight" step="0.1" placeholder="1.0">
        </div>
        <button class="hc-btn" onclick="hcKlorofilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-chlo-calc-result">
            <div id="hc-cl-res-total" style="font-size:1.2rem; font-weight:bold; color:var(--hc-primary);"></div>
            <div id="hc-cl-res-detail" style="margin-top:10px; font-size:0.9rem;"></div>
        </div>
    </div>
    <?php
}
