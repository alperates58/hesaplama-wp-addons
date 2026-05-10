<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duvar_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wall-area',
        HC_PLUGIN_URL . 'modules/duvar-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wall-area-css',
        HC_PLUGIN_URL . 'modules/duvar-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wall-area">
        <h3>Duvar Alanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wa-width">Duvar Uzunluğu (m):</label>
            <input type="number" id="hc-wa-width" step="0.01" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-wa-height">Duvar Yüksekliği (m):</label>
            <input type="number" id="hc-wa-height" step="0.01" placeholder="2.7">
        </div>
        <div class="hc-form-group">
            <label for="hc-wa-deduct">Düşülecek Alanlar (Kapı/Pencere m²):</label>
            <input type="number" id="hc-wa-deduct" step="0.01" placeholder="0.0">
            <small>Opsiyonel: Toplam alandan düşülecek boşluklar.</small>
        </div>
        <button class="hc-btn" onclick="hcWallAreaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wall-area-result">
            <strong>Net Duvar Alanı:</strong>
            <div id="hc-wa-res-val" class="hc-result-value">-</div>
            <span>Metrekare (m²)</span>
        </div>
    </div>
    <?php
}
