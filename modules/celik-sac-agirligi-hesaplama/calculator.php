<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_celik_sac_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-celik-sac-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/celik-sac-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-celik-sac-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/celik-sac-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-celik-sac-agirligi-hesaplama">
        <h3>Çelik Sac Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sac-w">Genişlik (m)</label>
            <input type="number" id="hc-sac-w" placeholder="Örn: 1.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-sac-l">Uzunluk (m)</label>
            <input type="number" id="hc-sac-l" placeholder="Örn: 3" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-sac-t">Kalınlık (mm)</label>
            <input type="number" id="hc-sac-t" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcSacHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sac-result">
            <div class="hc-result-label">Tahmini Ağırlık:</div>
            <div class="hc-result-value" id="hc-sac-val">-</div>
            <div class="hc-result-note">Çelik yoğunluğu 7.85 kg/m² (1mm kalınlık için) baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
