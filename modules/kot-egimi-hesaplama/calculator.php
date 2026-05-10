<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kot_egimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-grade-calc',
        HC_PLUGIN_URL . 'modules/kot-egimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-grade-calc-css',
        HC_PLUGIN_URL . 'modules/kot-egimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-grade">
        <h3>Kot Eğimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gc-rise">Yükseklik Farkı (Kot - m):</label>
            <input type="number" id="hc-gc-rise" step="0.01" placeholder="2.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-gc-run">Yatay Mesafe (m):</label>
            <input type="number" id="hc-gc-run" step="0.01" placeholder="50.0">
        </div>
        <button class="hc-btn" onclick="hcGradeCalcHesapla()">Eğimi Hesapla</button>
        <div class="hc-result" id="hc-grade-result">
            <strong>Eğim Yüzdesi:</strong>
            <div id="hc-gc-res-val" class="hc-result-value">-</div>
            <span>Yüzde (%)</span>
            <p id="hc-gc-res-deg" style="margin-top:10px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
