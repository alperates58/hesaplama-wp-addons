<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lens_buyutme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lens-buyutme-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/lens-buyutme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lens-buyutme-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lens-buyutme-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lens-buyutme-orani-hesaplama">
        <h3>Lens Büyütme Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lm-focal">Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-lm-focal" class="hc-input" placeholder="Örn: 50" value="50" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-lm-distance">Netleme Mesafesi (cm)</label>
            <input type="number" id="hc-lm-distance" class="hc-input" placeholder="Örn: 45" value="45" min="1" step="1">
        </div>

        <button class="hc-btn" onclick="hcLensBuyutmeOraniHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lens-buyutme-orani-hesaplama-result">
            <div class="hc-result-item">
                <span>Ondalık Büyütme Değeri:</span>
                <span class="hc-result-value" id="hc-lm-decimal-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Büyütme Oranı (Ratio):</span>
                <strong id="hc-lm-ratio-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Konu Görüntüsü Boyutu (Sensördeki Oran):</span>
                <strong id="hc-lm-desc-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
