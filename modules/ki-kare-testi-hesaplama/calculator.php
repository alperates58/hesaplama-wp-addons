<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ki_kare_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ki-kare-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/ki-kare-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ki-kare-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ki-kare-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ki-kare">
        <h3>Ki-Kare (Chi-Square) Uyum İyiliği Testi</h3>
        <div class="hc-form-group">
            <label for="hc-chi-obs">Gözlemlenen Değerler (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-chi-obs" class="hc-input" placeholder="Örn: 20, 30, 50"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-chi-exp">Beklenen Değerler (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-chi-exp" class="hc-input" placeholder="Örn: 33.3, 33.3, 33.3"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKiKareHesapla()">Test Et</button>
        <div class="hc-result" id="hc-ki-kare-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Ki-Kare (χ²):</span>
                    <strong id="hc-res-chi-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>S. Derecesi (df):</span>
                    <strong id="hc-res-chi-df">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>P-Değeri:</span>
                    <strong id="hc-res-chi-p">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Sonuç:</span>
                    <strong id="hc-res-chi-sig">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
