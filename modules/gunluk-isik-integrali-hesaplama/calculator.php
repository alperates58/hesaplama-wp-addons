<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_isik_integrali_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-isik-integrali-hesaplama',
        HC_PLUGIN_URL . 'modules/gunluk-isik-integrali-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunluk-isik-integrali-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunluk-isik-integrali-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunluk-isik-integrali-hesaplama">
        <h3>Günlük Işık İntegrali (DLI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dli-ppfd">Ortalama Işık Şiddeti (PPFD, µmol/m²/s)</label>
            <input type="number" id="hc-dli-ppfd" placeholder="Örn: 400" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dli-hours">Işıklanma Süresi (saat/gün)</label>
            <input type="number" id="hc-dli-hours" placeholder="Örn: 14" step="any">
        </div>
        <button class="hc-btn" onclick="hcDLIHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dli-result">
            <div class="hc-result-label">Günlük DLI:</div>
            <div class="hc-result-value" id="hc-dli-val">-</div>
            <div class="hc-result-note" id="hc-dli-note"></div>
        </div>
    </div>
    <?php
}
