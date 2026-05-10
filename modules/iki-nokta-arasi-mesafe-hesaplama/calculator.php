<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_nokta_arasi_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-distance',
        HC_PLUGIN_URL . 'modules/iki-nokta-arasi-mesafe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-distance-css',
        HC_PLUGIN_URL . 'modules/iki-nokta-arasi-mesafe-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-distance">
        <h3>İki Nokta Arası Mesafe</h3>
        <div class="hc-dist-grid">
            <div class="hc-dist-point">
                <strong>1. Nokta (A)</strong>
                <div class="hc-form-group"><label>x₁:</label><input type="number" id="hc-ds-x1" step="0.1"></div>
                <div class="hc-form-group"><label>y₁:</label><input type="number" id="hc-ds-y1" step="0.1"></div>
            </div>
            <div class="hc-dist-point">
                <strong>2. Nokta (B)</strong>
                <div class="hc-form-group"><label>x₂:</label><input type="number" id="hc-ds-x2" step="0.1"></div>
                <div class="hc-form-group"><label>y₂:</label><input type="number" id="hc-ds-y2" step="0.1"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcDistanceHesapla()">Mesafeyi Hesapla</button>
        <div class="hc-result" id="hc-distance-result">
            <strong>Mesafe (d):</strong>
            <div id="hc-ds-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
