<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_faktoryel_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-factorial',
        HC_PLUGIN_URL . 'modules/faktoryel-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-factorial-css',
        HC_PLUGIN_URL . 'modules/faktoryel-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-factorial">
        <h3>Faktöriyel Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fac-num">Sayı (n):</label>
            <input type="number" id="hc-fac-num" min="0" max="170" placeholder="örn: 5">
            <small>Maksimum 170 (Limitli hassasiyet)</small>
        </div>
        <button class="hc-btn" onclick="hcFactorialHesapla()">Faktöriyelini Al</button>
        <div class="hc-result" id="hc-factorial-result">
            <strong>Sonuç (n!):</strong>
            <div id="hc-fac-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
