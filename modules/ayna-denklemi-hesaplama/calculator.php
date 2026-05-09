<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayna_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ayna-denklemi-hesaplama',
        HC_PLUGIN_URL . 'modules/ayna-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ayna-denklemi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ayna-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ayna-denklemi-hesaplama">
        <h3>Ayna Denklemi (Optik) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ad-mirror">Ayna Tipi</label>
            <select id="hc-ad-mirror">
                <option value="concave">Çukur Ayna (Odak +)</option>
                <option value="convex">Tümsek Ayna (Odak -)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-f">Odak Uzaklığı (f - cm)</label>
            <input type="number" id="hc-ad-f" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-do">Nesne Mesafesi (d₀ - cm)</label>
            <input type="number" id="hc-ad-do" placeholder="Örn: 30" step="any">
        </div>
        <button class="hc-btn" onclick="hcADHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ad-result">
            <div class="hc-ad-grid">
                <div class="hc-ad-item">
                    <span class="hc-result-label">Görüntü Mesafesi (dᵢ):</span>
                    <span class="hc-result-value" id="hc-ad-di">-</span>
                </div>
                <div class="hc-ad-item">
                    <span class="hc-result-label">Büyütme (M):</span>
                    <span class="hc-result-value" id="hc-ad-m">-</span>
                </div>
            </div>
            <div class="hc-result-note">1/f = 1/d₀ + 1/dᵢ</div>
        </div>
    </div>
    <?php
}
