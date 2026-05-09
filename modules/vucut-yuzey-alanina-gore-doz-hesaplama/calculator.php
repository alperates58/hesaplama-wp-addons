<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yuzey_alanina_gore_doz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bsa-dosage',
        HC_PLUGIN_URL . 'modules/vucut-yuzey-alanina-gore-doz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bsa-dosage-css',
        HC_PLUGIN_URL . 'modules/vucut-yuzey-alanina-gore-doz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bsa-dosage">
        <h3>BSA'ya Göre Dozaj (Mosteller)</h3>
        <div class="hc-form-group">
            <label for="hc-bs-h">Boy [cm]</label>
            <input type="number" id="hc-bs-h" value="170" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-w">Kilo [kg]</label>
            <input type="number" id="hc-bs-w" value="70" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-adose">Yetişkin Dozu [mg]</label>
            <input type="number" id="hc-bs-adose" value="500" min="1">
        </div>
        <button class="hc-btn" onclick="hcBSADosageHesapla()">Dozu Hesapla</button>
        <div class="hc-result" id="hc-bsa-dosage-result">
            <div class="hc-result-item">
                <span>Vücut Yüzey Alanı (BSA):</span>
                <span id="hc-res-bs-area">0 m²</span>
            </div>
            <div class="hc-result-item">
                <span>Hesaplanan Doz:</span>
                <span class="hc-result-value" id="hc-res-bs-val">0 mg</span>
            </div>
            <p class="hc-bs-note">BSA = √[(Boy * Kilo) / 3600]. Ortalama yetişkin 1.73 m² baz alınır.</p>
        </div>
    </div>
    <?php
}
