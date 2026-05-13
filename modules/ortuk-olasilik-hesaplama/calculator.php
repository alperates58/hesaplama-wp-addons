<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortuk_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortuk-olasilik-hesaplama',
        HC_PLUGIN_URL . 'modules/ortuk-olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortuk-olasilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortuk-olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortuk-olasilik-hesaplama">
        <h3>Örtük Olasılık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-implied-odds">Ondalık Oran (Decimal Odds)</label>
            <input type="number" id="hc-implied-odds" step="0.01" min="1.01" placeholder="Örn: 2.50">
        </div>
        <button class="hc-btn" onclick="hcOrtukOlasilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ortuk-olasilik-hesaplama-result">
            <span class="hc-label">Örtük Olasılık:</span>
            <div class="hc-result-value" id="hc-implied-res-value">0</div>
            <div id="hc-implied-res-desc" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
