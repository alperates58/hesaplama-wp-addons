<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yakit-tuketimi-hesaplama',
        HC_PLUGIN_URL . 'modules/yakit-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yakit-tuketimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yakit-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yakit-tuketimi-hesaplama">
        <div class="hc-header">
            <h3>Yakıt Tüketimi Hesaplama</h3>
            <p>Aldığınız yakıt ve kat ettiğiniz yola göre gerçek tüketim değerlerinizi öğrenin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-fuel-amt">Alınan Yakıt (Litre)</label>
                <input type="number" id="hc-fuel-amt" placeholder="Örn: 45" step="0.1">
            </div>

            <div class="hc-form-group">
                <label for="hc-dist-traveled">Kat Edilen Yol (km)</label>
                <input type="number" id="hc-dist-traveled" placeholder="Örn: 650" step="1">
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-fuel-price-input">Litre Fiyatı (₺ - Opsiyonel)</label>
                <input type="number" id="hc-fuel-price-input" placeholder="Örn: 65.40" step="0.01">
            </div>
        </div>

        <button class="hc-btn" onclick="hcYakitTuketimiHesapla()">Tüketimi Hesapla</button>

        <div class="hc-result" id="hc-tuketim-result">
            <div class="hc-result-header">Tüketim Analizi</div>
            
            <div class="hc-main-tuketim">
                <strong id="hc-res-l100">0.0</strong>
                <span>L / 100km</span>
            </div>

            <div class="hc-res-details">
                <div class="hc-res-item">
                    <span>1 km Maliyeti:</span>
                    <strong id="hc-res-tl-km">-</strong>
                </div>
                <div class="hc-res-item">
                    <span>100 km Maliyeti:</span>
                    <strong id="hc-res-tl-100km">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
