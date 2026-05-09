<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulaniklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulaniklik',
        HC_PLUGIN_URL . 'modules/bulaniklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bulaniklik-css',
        HC_PLUGIN_URL . 'modules/bulaniklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bulaniklik">
        <h3>Bulanıklık (Turbidity) Normalizasyonu</h3>
        <div class="hc-form-group">
            <label for="hc-bl-raw">Ölçülen Bulanıklık (NTU)</label>
            <input type="number" id="hc-bl-raw" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-dil">Seyreltme Oranı (Örnek / Toplam)</label>
            <input type="number" id="hc-bl-dil" placeholder="Örn: 0.1" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcBulaniklikHesapla()">Normalize Et</button>
        <div class="hc-result" id="hc-bl-result">
            <div class="hc-result-label">Gerçek Bulanıklık:</div>
            <div class="hc-result-value" id="hc-bl-val">-</div>
            <div class="hc-result-note">Sonuç = Ölçülen / Seyreltme Oranı</div>
        </div>
    </div>
    <?php
}
