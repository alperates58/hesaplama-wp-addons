<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalga_boyundan_enerjiye_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dalga-boyundan-enerjiye-hesaplama',
        HC_PLUGIN_URL . 'modules/dalga-boyundan-enerjiye-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dalga-boyundan-enerjiye-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dalga-boyundan-enerjiye-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dalga-boyundan-enerjiye-hesaplama">
        <h3>Dalga Boyundan Enerjiye Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dbe-lambda">Dalga Boyu (λ - nm)</label>
            <input type="number" id="hc-dbe-lambda" placeholder="Örn: 500" step="any">
        </div>
        <button class="hc-btn" onclick="hcDBEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dbe-result">
            <div class="hc-dbe-grid">
                <div class="hc-dbe-item">
                    <span class="hc-result-label">Enerji (Joule):</span>
                    <span class="hc-result-value" id="hc-dbe-joule">-</span>
                </div>
                <div class="hc-dbe-item">
                    <span class="hc-result-label">Enerji (eV):</span>
                    <span class="hc-result-value" id="hc-dbe-ev">-</span>
                </div>
            </div>
            <div class="hc-result-note">E = (h * c) / λ</div>
        </div>
    </div>
    <?php
}
