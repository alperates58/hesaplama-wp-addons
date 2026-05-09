<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_canli_agirlik_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-canli-agirlik-artisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gunluk-canli-agirlik-artisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunluk-canli-agirlik-artisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunluk-canli-agirlik-artisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunluk-canli-agirlik-artisi-hesaplama">
        <h3>Günlük Canlı Ağırlık Artışı (GCAA)</h3>
        <div class="hc-form-group">
            <label for="hc-gcaa-w1">İlk Tartım (kg)</label>
            <input type="number" id="hc-gcaa-w1" placeholder="Örn: 300" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gcaa-w2">Son Tartım (kg)</label>
            <input type="number" id="hc-gcaa-w2" placeholder="Örn: 450" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gcaa-days">Süre (gün)</label>
            <input type="number" id="hc-gcaa-days" placeholder="Örn: 90" step="any">
        </div>
        <button class="hc-btn" onclick="hcGCAAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gcaa-result">
            <div class="hc-result-label">Günlük Artış:</div>
            <div class="hc-result-value" id="hc-gcaa-val">-</div>
            <div class="hc-result-note" id="hc-gcaa-note"></div>
        </div>
    </div>
    <?php
}
