<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ters_matris_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inv-matrix',
        HC_PLUGIN_URL . 'modules/ters-matris-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inv-matrix-css',
        HC_PLUGIN_URL . 'modules/ters-matris-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-matrix">
        <h3>2x2 Ters Matris Hesaplama</h3>
        <div class="hc-matrix-grid">
            <input type="number" id="hc-m-a" placeholder="a">
            <input type="number" id="hc-m-b" placeholder="b">
            <input type="number" id="hc-m-c" placeholder="c">
            <input type="number" id="hc-m-d" placeholder="d">
        </div>
        <button class="hc-btn" onclick="hcInvMatrixHesapla()">Tersini Al</button>
        <div class="hc-result" id="hc-ters-matris-result">
            <strong>Matrisin Tersi (A⁻¹):</strong>
            <div id="hc-m-res-val" class="hc-matrix-res">
                <div class="hc-matrix-grid" style="margin-top:10px;">
                    <div id="hc-m-res-a">-</div>
                    <div id="hc-m-res-b">-</div>
                    <div id="hc-m-res-c">-</div>
                    <div id="hc-m-res-d">-</div>
                </div>
            </div>
            <p id="hc-m-det" style="margin-top:10px; font-size:0.8rem;"></p>
        </div>
    </div>
    <?php
}
