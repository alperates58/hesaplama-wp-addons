<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kusur_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kusur-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/kusur-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kusur-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kusur-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kusur-orani">
        <h3>Kusur Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-defect-total">Toplam Üretim / Örneklem Adedi:</label>
            <input type="number" id="hc-defect-total" class="hc-input" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-defect-count">Kusurlu (Hatalı) Ürün Adedi:</label>
            <input type="number" id="hc-defect-count" class="hc-input" placeholder="Örn: 5">
        </div>
        <button class="hc-btn" onclick="hcKusurOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kusur-orani-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Kusur Oranı:</span>
                    <strong id="hc-res-defect-ratio">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Verimlilik (Yield):</span>
                    <strong id="hc-res-yield">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
