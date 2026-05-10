<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tansiyon_degerlendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tansiyon-degerlendirme-hesaplama',
        HC_PLUGIN_URL . 'modules/tansiyon-degerlendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tansiyon-degerlendirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tansiyon-degerlendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bp-eval">
        <h3>Tansiyon Değerlendirme</h3>
        <div class="hc-form-group">
            <label for="hc-bp-sys">Sistolik (Büyük) Tansiyon (mmHg)</label>
            <input type="number" id="hc-bp-sys" placeholder="Örn: 120">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-dia">Diyastolik (Küçük) Tansiyon (mmHg)</label>
            <input type="number" id="hc-bp-dia" placeholder="Örn: 80">
        </div>
        <button class="hc-btn" onclick="hcTansiyonDeğerlendirmeHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-bp-result">
            <div class="hc-result-label">Kategori:</div>
            <div class="hc-result-value" id="hc-bp-val">-</div>
            <p id="hc-bp-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
