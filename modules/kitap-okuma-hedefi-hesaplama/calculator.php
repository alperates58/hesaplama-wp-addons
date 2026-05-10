<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kitap_okuma_hedefi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kitap-okuma-hedefi-hesaplama',
        HC_PLUGIN_URL . 'modules/kitap-okuma-hedefi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kitap-okuma-hedefi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kitap-okuma-hedefi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reading">
        <h3>Kitap Okuma Hedefi</h3>
        <div class="hc-form-group">
            <label for="hc-read-pages">Kitap Sayfa Sayısı</label>
            <input type="number" id="hc-read-pages" placeholder="Örn: 350">
        </div>
        <div class="hc-form-group">
            <label for="hc-read-days">Bitirme Hedefi (Gün)</label>
            <input type="number" id="hc-read-days" placeholder="Örn: 7">
        </div>
        <button class="hc-btn" onclick="hcKitapOkumaHedefiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-read-result">
            <div class="hc-result-label">Günlük Okunması Gereken:</div>
            <div class="hc-result-value" id="hc-read-val">-</div>
            <div id="hc-read-time" style="margin-top: 10px; font-size: 0.9em; font-style: italic;"></div>
        </div>
    </div>
    <?php
}
