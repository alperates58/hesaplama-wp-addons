<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_soluk_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soluk-hacmi',
        HC_PLUGIN_URL . 'modules/soluk-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soluk-hacmi-css',
        HC_PLUGIN_URL . 'modules/soluk-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soluk-hacmi">
        <h3>Soluk Hacmi (Tidal Volüm) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sh-weight">Vücut Ağırlığı (kg):</label>
            <input type="number" id="hc-sh-weight" placeholder="Örn: 70" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcSolukHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-soluk-hacmi-result">
            <strong>Önerilen Soluk Hacmi Aralığı (6-8 mL/kg):</strong>
            <div id="hc-sh-res-val" class="hc-result-value">-</div>
            <span>mL</span>
            <p id="hc-sh-note" style="margin-top:10px; font-size:0.9em; opacity:0.8;"></p>
        </div>
    </div>
    <?php
}
