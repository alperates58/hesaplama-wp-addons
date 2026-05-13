<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hata_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hata-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/hata-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hata-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hata-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hata-orani">
        <h3>Hata Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-error-total">Toplam İşlem / Veri Adedi:</label>
            <input type="number" id="hc-error-total" class="hc-input" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-error-count">Hatalı İşlem / Veri Adedi:</label>
            <input type="number" id="hc-error-count" class="hc-input" placeholder="Örn: 12">
        </div>
        <button class="hc-btn" onclick="hcHataOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hata-orani-result">
            <div class="hc-result-label">Hata Oranı:</div>
            <div class="hc-result-value" id="hc-res-error-ratio">-</div>
            <p id="hc-error-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
