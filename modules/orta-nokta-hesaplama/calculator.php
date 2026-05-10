<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orta_nokta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-midpoint',
        HC_PLUGIN_URL . 'modules/orta-nokta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-midpoint-css',
        HC_PLUGIN_URL . 'modules/orta-nokta-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-midpoint">
        <h3>Orta Nokta Hesaplama</h3>
        <div class="hc-mid-grid">
            <div class="hc-mid-point">
                <h4>Nokta A</h4>
                <div class="hc-form-group">
                    <label>x1:</label>
                    <input type="number" id="hc-m-x1" step="any" placeholder="2">
                </div>
                <div class="hc-form-group">
                    <label>y1:</label>
                    <input type="number" id="hc-m-y1" step="any" placeholder="4">
                </div>
            </div>
            <div class="hc-mid-point">
                <h4>Nokta B</h4>
                <div class="hc-form-group">
                    <label>x2:</label>
                    <input type="number" id="hc-m-x2" step="any" placeholder="8">
                </div>
                <div class="hc-form-group">
                    <label>y2:</label>
                    <input type="number" id="hc-m-y2" step="any" placeholder="10">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcMidpointHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-midpoint-result">
            <strong>Orta Nokta (M):</strong>
            <div id="hc-m-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
