<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_merdiven_metrekup_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-merdiven-metrekup-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-merdiven-metrekup-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-merdiven-metrekup-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-merdiven-metrekup-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-merdiven-metrekup-hesaplama">
        <h3>Beton Merdiven Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bm-steps">Basamak Sayısı</label>
            <input type="number" id="hc-bm-steps" placeholder="Örn: 15" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-width">Merdiven Genişliği (cm)</label>
            <input type="number" id="hc-bm-width" placeholder="Örn: 100" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-riser">Rıht Yüksekliği (cm)</label>
            <input type="number" id="hc-bm-riser" placeholder="Örn: 17" value="17">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-tread">Basamak Genişliği (cm)</label>
            <input type="number" id="hc-bm-tread" placeholder="Örn: 28" value="28">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-waist">Plaka (Bel) Kalınlığı (cm)</label>
            <input type="number" id="hc-bm-waist" placeholder="Örn: 15" value="15">
        </div>
        <button class="hc-btn" onclick="hcBMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bm-result">
            <div class="hc-result-label">Toplam Beton Hacmi:</div>
            <div class="hc-result-value" id="hc-bm-val">-</div>
            <div class="hc-result-note">Basamaklar ve taşıyıcı plaka hacmi dahildir.</div>
        </div>
    </div>
    <?php
}
