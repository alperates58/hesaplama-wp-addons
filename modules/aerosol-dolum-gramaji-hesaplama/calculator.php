<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aerosol_dolum_gramaji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aerosol-dolum',
        HC_PLUGIN_URL . 'modules/aerosol-dolum-gramaji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aerosol-dolum-css',
        HC_PLUGIN_URL . 'modules/aerosol-dolum-gramaji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aerosol-dolum">
        <h3>Aerosol Dolum Gramajı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ad-vol">Kutu Hacmi (ml)</label>
            <input type="number" id="hc-ad-vol" placeholder="Örn: 400" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-density">Konsantre Yoğunluğu (g/ml)</label>
            <input type="number" id="hc-ad-density" placeholder="Örn: 0.85" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-fill-pct">Dolum Oranı (%)</label>
            <input type="number" id="hc-ad-fill-pct" placeholder="Örn: 60" value="60" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-gas-pct">Gaz Oranı (%)</label>
            <input type="number" id="hc-ad-gas-pct" placeholder="Örn: 30" value="30" step="any">
        </div>
        <button class="hc-btn" onclick="hcAerosolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ad-result">
            <div class="hc-ad-grid">
                <div class="hc-ad-item">
                    <span class="hc-result-label">Konsantre Ağırlığı:</span>
                    <span class="hc-result-value" id="hc-ad-conc-val">-</span>
                </div>
                <div class="hc-ad-item">
                    <span class="hc-result-label">Gaz Ağırlığı:</span>
                    <span class="hc-result-value" id="hc-ad-gas-val">-</span>
                </div>
                <div class="hc-ad-item">
                    <span class="hc-result-label">Toplam Net Ağırlık:</span>
                    <span class="hc-result-value" id="hc-ad-total-val">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
