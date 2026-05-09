<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_esans_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-esans',
        HC_PLUGIN_URL . 'modules/esans-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-esans-css',
        HC_PLUGIN_URL . 'modules/esans-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-esans">
        <h3>Esans ve Formülasyon Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eso-v">Toplam Ürün Hacmi/Kütlesi (ml veya g)</label>
            <input type="number" id="hc-eso-v" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-eso-p">Hedef Esans Oranı (%)</label>
            <input type="number" id="hc-eso-p" placeholder="Örn: 15 (EDP)" step="any">
        </div>
        <button class="hc-btn" onclick="hcESOHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eso-result">
            <div class="hc-eso-grid">
                <div class="hc-eso-item"><span>Gereken Esans:</span> <span id="hc-eso-res1">-</span></div>
                <div class="hc-eso-item"><span>Gereken Baz (Alkol/Yağ):</span> <span id="hc-eso-res2">-</span></div>
            </div>
            <div class="hc-result-note">Esans miktarı toplam hacim üzerinden hesaplanır.</div>
        </div>
    </div>
    <?php
}
