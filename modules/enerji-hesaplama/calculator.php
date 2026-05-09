<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enerji-hesaplama',
        HC_PLUGIN_URL . 'modules/enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enerji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enerji-hesaplama">
        <h3>Enerji (Tüketim/Üretim) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-en-p">Güç (P - Watt)</label>
            <input type="number" id="hc-en-p" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-en-t">Süre (t - Saat)</label>
            <input type="number" id="hc-en-t" placeholder="Örn: 24" step="any">
        </div>
        <button class="hc-btn" onclick="hcENHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-en-result">
            <div class="hc-en-grid">
                <div class="hc-en-item">
                    <span class="hc-result-label">Toplam Enerji (kWh):</span>
                    <span class="hc-result-value" id="hc-en-kwh">-</span>
                </div>
                <div class="hc-en-item">
                    <span class="hc-result-label">Toplam Enerji (Joule):</span>
                    <span class="hc-result-value" id="hc-en-joule">-</span>
                </div>
            </div>
            <div class="hc-result-note">E = P * t</div>
        </div>
    </div>
    <?php
}
