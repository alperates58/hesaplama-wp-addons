<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_egimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cati-egimi-hesaplama',
        HC_PLUGIN_URL . 'modules/cati-egimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cati-egimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cati-egimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cati-egimi-hesaplama">
        <h3>Çatı Eğimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ce-rise">Yükseklik (Rise) (m)</label>
            <input type="number" id="hc-ce-rise" placeholder="Örn: 1.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ce-run">Yatay Mesafe (Run) (m)</label>
            <input type="number" id="hc-ce-run" placeholder="Örn: 4" step="any">
        </div>
        <button class="hc-btn" onclick="hcCEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ce-result">
            <div class="hc-ce-grid">
                <div class="hc-ce-item">
                    <span class="hc-result-label">Eğim Yüzdesi:</span>
                    <span class="hc-result-value" id="hc-ce-percent">-</span>
                </div>
                <div class="hc-ce-item">
                    <span class="hc-result-label">Eğim Açısı:</span>
                    <span class="hc-result-value" id="hc-ce-angle">-</span>
                </div>
            </div>
            <div class="hc-result-note">Eğim = (Yükseklik / Yatay Mesafe) * 100</div>
        </div>
    </div>
    <?php
}
