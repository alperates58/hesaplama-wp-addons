<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_cevre_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-cevre-uzunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-cevre-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-cevre-uzunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-cevre-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-cevre-uzunlugu-hesaplama">
        <h3>Çit Çevre Uzunluğu Hesaplama</h3>
        <div id="hc-ccu-sides">
            <div class="hc-form-group">
                <label>Kenar 1 (m)</label>
                <input type="number" class="hc-ccu-input" placeholder="Örn: 10" step="any">
            </div>
            <div class="hc-form-group">
                <label>Kenar 2 (m)</label>
                <input type="number" class="hc-ccu-input" placeholder="Örn: 15" step="any">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcCCUAddSide()">+ Kenar Ekle</button>
        <button class="hc-btn" onclick="hcCCUHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ccu-result">
            <div class="hc-result-label">Toplam Çevre Uzunluğu:</div>
            <div class="hc-result-value" id="hc-ccu-val">-</div>
            <div class="hc-result-note">Girdiğiniz tüm kenarların toplamıdır.</div>
        </div>
    </div>
    <?php
}
