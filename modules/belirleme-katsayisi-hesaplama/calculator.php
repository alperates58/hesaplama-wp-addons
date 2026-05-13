<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_belirleme_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-belirleme-katsayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/belirleme-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-belirleme-katsayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/belirleme-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-r2-calc">
        <h3>Belirleme Katsayısı (R²) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-r2-actual">Gerçek Değerler (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-r2-actual" class="hc-input" placeholder="Örn: 3, 5, 7, 9"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-r2-pred">Tahmin Edilen Değerler (Aynı sırada):</label>
            <textarea id="hc-r2-pred" class="hc-input" placeholder="Örn: 2.8, 5.1, 6.9, 9.2"></textarea>
        </div>
        <button class="hc-btn" onclick="hcR2Hesapla()">R² Hesapla</button>
        <div class="hc-result" id="hc-belirleme-katsayisi-hesaplama-result">
            <div class="hc-result-label">Belirleme Katsayısı (R²):</div>
            <div class="hc-result-value" id="hc-res-r2-val">-</div>
            <p id="hc-r2-desc" style="margin-top:10px; font-size:0.9em;"></p>
            <p style="margin-top:5px; font-size:0.8em; color:#666;">Formül: R² = 1 - (Σ(y - ŷ)² / Σ(y - ȳ)²)</p>
        </div>
    </div>
    <?php
}
