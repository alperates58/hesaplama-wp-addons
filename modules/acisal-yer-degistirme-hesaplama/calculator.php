<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_yer_degistirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-yer-degistirme-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-yer-degistirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-yer-degistirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-yer-degistirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-yer-degistirme-hesaplama">
        <h3>Açısal Yer Değiştirme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ayd-w">Açısal Hız (ω - rad/s)</label>
            <input type="number" id="hc-ayd-w" placeholder="Örn: 2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ayd-t">Süre (t - s)</label>
            <input type="number" id="hc-ayd-t" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcAYDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ayd-result">
            <div class="hc-ayd-grid">
                <div class="hc-ayd-item">
                    <span class="hc-result-label">Radyan:</span>
                    <span class="hc-result-value" id="hc-ayd-rad">-</span>
                </div>
                <div class="hc-ayd-item">
                    <span class="hc-result-label">Derece:</span>
                    <span class="hc-result-value" id="hc-ayd-deg">-</span>
                </div>
            </div>
            <div class="hc-result-note">Δθ = ω * t</div>
        </div>
    </div>
    <?php
}
