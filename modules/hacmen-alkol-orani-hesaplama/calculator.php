<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacmen_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-abv-calc-js',
        HC_PLUGIN_URL . 'modules/hacmen-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-abv-calc-css',
        HC_PLUGIN_URL . 'modules/hacmen-alkol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-abv">
        <h3>Hacmen Alkol Oranı (ABV) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-og">İlk Yoğunluk (Original Gravity - OG)</label>
            <input type="number" id="hc-og" placeholder="Örn: 1.050" step="0.001" value="1.050">
        </div>

        <div class="hc-form-group">
            <label for="hc-fg">Son Yoğunluk (Final Gravity - FG)</label>
            <input type="number" id="hc-fg" placeholder="Örn: 1.010" step="0.001" value="1.010">
        </div>

        <button class="hc-btn" onclick="hcABVHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-abv-result">
            <div class="hc-result-item">
                <span>Alkol Oranı (ABV):</span>
                <strong class="hc-result-value" id="hc-abv-val">-</strong>
            </div>
            <div class="hc-abv-stats">
                <div>Zayıflatma (Attenuation): <span id="hc-abv-att">-</span></div>
            </div>
            <div class="hc-result-note">Formül: (OG - FG) × 131.25</div>
        </div>
    </div>
    <?php
}
