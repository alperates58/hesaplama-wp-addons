<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalis_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dive-weight',
        HC_PLUGIN_URL . 'modules/dalis-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dive-weight-css',
        HC_PLUGIN_URL . 'modules/dalis-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dive-weight">
        <h3>Dalış Ağırlığı (Lead) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-dw-weight">Vücut Ağırlığınız (kg):</label>
            <input type="number" id="hc-dw-weight" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-dw-suit">Elbise Kalınlığı:</label>
            <select id="hc-dw-suit">
                <option value="0">Elbisesiz / Şort (0 kg)</option>
                <option value="1">3mm Neopren (+1 kg)</option>
                <option value="3" selected>5mm Neopren (+3 kg)</option>
                <option value="5">7mm Neopren (+5 kg)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dw-water">Su Tipi:</label>
            <select id="hc-dw-water">
                <option value="0">Tatlı Su</option>
                <option value="2">Tuzlu Su (Deniz) (+2 kg)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDiveWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dive-weight-result">
            <strong>Tahmini Gerekli Kurşun:</strong>
            <div id="hc-dw-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
            <p style="margin-top:15px; font-size:0.8rem; font-style:italic;">Bu değer genel bir tahmindir. Daima "Ağırlık Kontrolü" testi yapınız.</p>
        </div>
    </div>
    <?php
}
