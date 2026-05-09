<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-agirligi-hesaplama">
        <h3>Beton Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ba-vol">Beton Hacmi (m³)</label>
            <input type="number" id="hc-ba-vol" placeholder="Örn: 5" step="any">
        </div>
        <button class="hc-btn" onclick="hcBetonAgirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ba-result">
            <div class="hc-result-label">Toplam Ağırlık:</div>
            <div class="hc-result-value" id="hc-ba-val">-</div>
            <div class="hc-result-note">Donatılı beton için ortalama yoğunluk 2.400 kg/m³ baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
