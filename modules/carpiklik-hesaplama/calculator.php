<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_carpiklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carpiklik-hesaplama',
        HC_PLUGIN_URL . 'modules/carpiklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carpiklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/carpiklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-skewness">
        <h3>Çarpıklık (Skewness) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-skew-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-skew-data" class="hc-input" placeholder="Örn: 10, 12, 13, 15, 18, 20, 25, 40"></textarea>
        </div>
        <button class="hc-btn" onclick="hcSkewnessHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-carpiklik-hesaplama-result">
            <div class="hc-result-label">Çarpıklık Katsayısı:</div>
            <div class="hc-result-value" id="hc-res-skew-val">-</div>
            <p id="hc-skew-desc" style="margin-top:10px; font-weight: bold;"></p>
            <p style="font-size: 0.85em; color: #666; margin-top: 5px;">
                (> 0: Pozitif Çarpık / Sağa Kuyruklu, < 0: Negatif Çarpık / Sola Kuyruklu, 0: Simetrik)
            </p>
        </div>
    </div>
    <?php
}
