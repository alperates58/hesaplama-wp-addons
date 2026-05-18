<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_teleskop_buyutme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-teleskop-buyutme-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/teleskop-buyutme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-teleskop-buyutme-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/teleskop-buyutme-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-teleskop-buyutme-orani-hesaplama">
        <div class="hc-cal-header">
            <h3>Teleskop Büyütme Oranı Hesaplama</h3>
            <p>Teleskobunuzun odak uzunluğu ile kullandığınız göz merceğinin (oküler) odak uzunluğuna göre büyütme çarpanını ve maksimum faydalı büyütme limitini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-tbo-f-tel">Teleskop Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-tbo-f-tel" class="hc-input" placeholder="örn. 1000" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-tbo-f-eye">Oküler (Göz Merceği) Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-tbo-f-eye" class="hc-input" placeholder="örn. 10 veya 25" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-tbo-aperture">Teleskop Açıklığı (Objektif Çapı - mm)</label>
            <input type="number" id="hc-tbo-aperture" class="hc-input" placeholder="örn. 102 veya 150" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcTeleskopBuyutmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-teleskop-buyutme-orani-hesaplama-result">
            <div class="hc-result-title">Optik Analiz Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Büyütme Oranı:</span>
                <span class="hc-result-value" id="hc-tbo-res-mag">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Odak Oranı (f/değeri):</span>
                <span class="hc-result-value" id="hc-tbo-res-ratio">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Maksimum Faydalı Büyütme:</span>
                <span class="hc-result-value" id="hc-tbo-res-max">-</span>
            </div>
            <div class="hc-result-desc" id="hc-tbo-desc"></div>
        </div>
    </div>
    <?php
}
