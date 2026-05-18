<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_weber_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weber-hesaplama',
        HC_PLUGIN_URL . 'modules/weber-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-weber-hesaplama-css',
        HC_PLUGIN_URL . 'modules/weber-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weber-hesaplama">
        <div class="hc-cal-header">
            <h3>Weber (Manyetik Akı) Hesaplama</h3>
            <p>Elektromanyetizmanın temel büyüklüklerinden olan manyetik akıyı (Weber); manyetik alan şiddeti, yüzey alanı ve kuvvet çizgilerinin yüzeyle yaptığı açıya göre hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-web-solve">Hesaplanacak Değişken</label>
            <select id="hc-web-solve" class="hc-select" onchange="hcWeberSolveDegisti()">
                <option value="flux">Manyetik Akı (Φ - Weber - Wb)</option>
                <option value="field">Manyetik Alan (B - Tesla - T)</option>
                <option value="area">Yüzey Alanı (A - m²)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-web-flux-group" style="display:none;">
            <label for="hc-web-flux">Manyetik Akı (Φ - Weber - Wb)</label>
            <input type="number" id="hc-web-flux" class="hc-input" placeholder="örn. 0.05" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-web-field-group">
            <label for="hc-web-field">Manyetik Alan (B - Tesla - T)</label>
            <input type="number" id="hc-web-field" class="hc-input" placeholder="örn. 1.5 (örn. güçlü bir neodyum mıknatıs)" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-web-area-group">
            <label for="hc-web-area">Yüzey Alanı (A - metrekare - m²)</label>
            <input type="number" id="hc-web-area" class="hc-input" placeholder="örn. 0.02 (yani 200 cm²)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-web-theta">Uygulama Açısı (Yüzey Normali ile Açı - Derece)</label>
            <input type="number" id="hc-web-theta" class="hc-input" value="0" step="any" min="0" max="90">
            <span style="font-size: 11px; color: #777;">Yüzeye tam dik çizgiler için normal açısı 0 derecedir (maksimum akı).</span>
        </div>

        <button class="hc-btn" onclick="hcWeberHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-weber-hesaplama-result">
            <div class="hc-result-title">Manyetik Akı Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-web-res-label">Hesaplanan Değer:</span>
                <span class="hc-result-value" id="hc-web-res-val">-</span>
            </div>
            <div class="hc-result-item" id="hc-web-res-extra-row">
                <span class="hc-result-label">Maxwell (Mx) Karşılığı:</span>
                <span class="hc-result-value" id="hc-web-res-maxwell">-</span>
            </div>
            <div class="hc-result-desc" id="hc-web-desc"></div>
        </div>
    </div>
    <?php
}
