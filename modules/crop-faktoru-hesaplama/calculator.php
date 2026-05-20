<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_crop_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-crop-faktoru-hesaplama',
        HC_PLUGIN_URL . 'modules/crop-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-crop-faktoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/crop-faktoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-crop-faktoru-hesaplama">
        <h3>Crop Faktörü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cf-preset">Hazır Sensör Boyutu</label>
            <select id="hc-cf-preset" class="hc-select" onchange="hcCropFaktoruPresetGuncelle()">
                <option value="36,24">Full Frame (36 x 24 mm)</option>
                <option value="27.9,18.6">APS-H (27.9 x 18.6 mm)</option>
                <option value="23.6,15.6" selected>APS-C (Nikon/Sony/Fuji 1.5x) (23.6 x 15.6 mm)</option>
                <option value="22.2,14.8">APS-C (Canon 1.6x) (22.2 x 14.8 mm)</option>
                <option value="17.3,13.0">Micro Four Thirds (17.3 x 13 mm)</option>
                <option value="13.2,8.8">1" Sensör (13.2 x 8.8 mm)</option>
                <option value="6.17,4.55">1/2.3" Sensör (6.17 x 4.55 mm)</option>
                <option value="custom">Özel Boyut...</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-cf-width">Sensör Genişliği (mm)</label>
            <input type="number" id="hc-cf-width" class="hc-input" placeholder="Genişlik" value="23.6" min="1" max="100" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-cf-height">Sensör Yüksekliği (mm)</label>
            <input type="number" id="hc-cf-height" class="hc-input" placeholder="Yükseklik" value="15.6" min="1" max="100" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcCropFaktoruHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-crop-faktoru-hesaplama-result">
            <div class="hc-result-item">
                <span>Köşegen Uzunluğu (Diagonal):</span>
                <strong id="hc-cf-diag-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Crop Faktörü:</span>
                <span class="hc-result-value" id="hc-cf-factor-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
