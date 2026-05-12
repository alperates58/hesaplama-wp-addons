<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurta_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egg-qty-js',
        HC_PLUGIN_URL . 'modules/yumurta-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-egg-qty-css',
        HC_PLUGIN_URL . 'modules/yumurta-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-egg-qty">
        <h3>Yumurta Boyut/Ağırlık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eq-count">Yumurta Adedi</label>
            <input type="number" id="hc-eq-count" value="1" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-eq-size">Mevcut Yumurta Boyutu</label>
            <select id="hc-eq-size">
                <option value="50">Small (S) - 50g</option>
                <option value="58">Medium (M) - 58g</option>
                <option value="68">Large (L) - 68g</option>
                <option value="78">X-Large (XL) - 78g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYumurtaMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-egg-qty-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Ağırlık:</span>
                <strong class="hc-result-value" id="hc-eq-res-val">-</strong>
            </div>
            <div class="hc-result-note">
                <strong>Bilgi:</strong> Tariflerde aksi belirtilmedikçe genellikle "Medium (M)" boy yumurta baz alınır.
            </div>
        </div>
    </div>
    <?php
}
