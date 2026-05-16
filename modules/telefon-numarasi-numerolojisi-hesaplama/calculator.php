<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_telefon_numarasi_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-telefon-numarasi-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/telefon-numarasi-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-telefon-numarasi-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/telefon-numarasi-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-phone-numerology">
        <h3>Telefon Numarası Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tn-number">Telefon Numarası (Sadece rakamlar):</label>
            <input type="text" id="hc-tn-number" class="hc-input" placeholder="Örn: 05321234567">
        </div>
        <button class="hc-btn" onclick="hcPhoneNumerologyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-telefon-numarasi-numerolojisi-hesaplama-result">
            <div class="hc-result-label">Numaranızın Numerolojik Sayısı:</div>
            <div class="hc-result-value" id="hc-res-tn-val">-</div>
            <div id="hc-res-tn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
