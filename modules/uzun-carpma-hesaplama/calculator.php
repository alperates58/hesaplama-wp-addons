<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzun_carpma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-long-mul',
        HC_PLUGIN_URL . 'modules/uzun-carpma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-long-mul">
        <h3>Uzun Çarpma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lm-s1">1. Sayı:</label>
            <input type="number" id="hc-lm-s1" placeholder="1234">
        </div>
        <div class="hc-form-group">
            <label for="hc-lm-s2">2. Sayı:</label>
            <input type="number" id="hc-lm-s2" placeholder="56">
        </div>
        <button class="hc-btn" onclick="hcLongMulHesapla()">Çarp</button>
        <div class="hc-result" id="hc-uzun-carpma-result">
            <strong>Sonuç:</strong>
            <div id="hc-lm-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
