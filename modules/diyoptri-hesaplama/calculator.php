<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diyoptri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diyoptri-hesaplama',
        HC_PLUGIN_URL . 'modules/diyoptri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-diyoptri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/diyoptri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-diyoptri-hesaplama">
        <h3>Diyoptri (Gözlük Numarası) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-di-f">Odak Uzaklığı (f - cm)</label>
            <input type="number" id="hc-di-f" placeholder="Örn: 50" step="any">
        </div>
        <button class="hc-btn" onclick="hcDIHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-di-result">
            <div class="hc-result-label">Mercek Gücü (Diyoptri):</div>
            <div class="hc-result-value" id="hc-di-val">-</div>
            <div class="hc-result-note">D = 1 / f (f metre cinsinden)</div>
        </div>
    </div>
    <?php
}
