<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_skaler_carpim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dot-product',
        HC_PLUGIN_URL . 'modules/skaler-carpim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dot-product-css',
        HC_PLUGIN_URL . 'modules/skaler-carpim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dot">
        <h3>Skaler Çarpım (A · B)</h3>
        <div class="hc-dot-grid">
            <div class="hc-dot-vec">
                <h4>Vektör A</h4>
                <div class="hc-form-group">
                    <label>Ax:</label>
                    <input type="number" id="hc-d-ax" placeholder="2">
                </div>
                <div class="hc-form-group">
                    <label>Ay:</label>
                    <input type="number" id="hc-d-ay" placeholder="3">
                </div>
                <div class="hc-form-group">
                    <label>Az:</label>
                    <input type="number" id="hc-d-az" placeholder="0">
                </div>
            </div>
            <div class="hc-dot-vec">
                <h4>Vektör B</h4>
                <div class="hc-form-group">
                    <label>Bx:</label>
                    <input type="number" id="hc-d-bx" placeholder="4">
                </div>
                <div class="hc-form-group">
                    <label>By:</label>
                    <input type="number" id="hc-d-by" placeholder="-1">
                </div>
                <div class="hc-form-group">
                    <label>Bz:</label>
                    <input type="number" id="hc-d-bz" placeholder="5">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcDotProductHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-skaler-carpim-result">
            <strong>Sonuç (A · B):</strong>
            <div id="hc-d-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
