<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nd_filtre_pozlama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nd-filtre-pozlama-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/nd-filtre-pozlama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nd-filtre-pozlama-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nd-filtre-pozlama-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nd-filtre-pozlama-suresi-hesaplama">
        <h3>ND Filtre Pozlama Süresi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-nd-original-time">Orijinal Deklanşör Süresi (saniye)</label>
            <input type="number" id="hc-nd-original-time" class="hc-input" placeholder="Örn: 0.01" value="0.01" min="0.001" step="0.001">
        </div>

        <div class="hc-form-group">
            <label for="hc-nd-stops">ND Filtre Duruluk Derecesi (Stops)</label>
            <select id="hc-nd-stops" class="hc-select">
                <option value="1">1 Stop (factor: 2x)</option>
                <option value="2">2 Stops (factor: 4x)</option>
                <option value="3">3 Stops (factor: 8x)</option>
                <option value="4">4 Stops (factor: 16x)</option>
                <option value="5">5 Stops (factor: 32x)</option>
                <option value="6" selected>6 Stops (factor: 64x)</option>
                <option value="7">7 Stops (factor: 128x)</option>
                <option value="8">8 Stops (factor: 256x)</option>
                <option value="9">9 Stops (factor: 512x)</option>
                <option value="10">10 Stops (factor: 1024x)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcNdFiltrePozlamaSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-nd-filtre-pozlama-suresi-hesaplama-result">
            <div class="hc-result-item">
                <span>ND Filtre Çarpanı:</span>
                <strong id="hc-nd-factor-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yeni Pozlama Süresi (saniye):</span>
                <strong id="hc-nd-new-time-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yeni Pozlama Süresi (m:ss):</span>
                <strong id="hc-nd-new-time-formatted-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Işık Azaltma:</span>
                <strong id="hc-nd-reduction-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
