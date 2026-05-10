<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hardy_weinberg_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hw-calc',
        HC_PLUGIN_URL . 'modules/hardy-weinberg-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hw-calc-css',
        HC_PLUGIN_URL . 'modules/hardy-weinberg-dengesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hw-calc">
        <h3>Hardy-Weinberg Dengesi</h3>
        <div class="hc-form-group">
            <label for="hc-hw-p">Baskın Alel Frekansı (p):</label>
            <input type="number" id="hc-hw-p" step="0.01" min="0" max="1" placeholder="0.6">
        </div>
        <div class="hc-form-group">
            <label for="hc-hw-q">Çekinik Alel Frekansı (q):</label>
            <input type="number" id="hc-hw-q" step="0.01" min="0" max="1" placeholder="0.4">
            <small>Birini girmeniz yeterlidir (p + q = 1).</small>
        </div>
        <button class="hc-btn" onclick="hcHwHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hw-calc-result">
            <div id="hc-hw-res-summary"></div>
        </div>
    </div>
    <?php
}
