<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_tahtasi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-tahtasi-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-tahtasi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-tahtasi-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-tahtasi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-tahtasi-miktari-hesaplama">
        <h3>Çit Tahtası Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cta-len">Toplam Çit Uzunluğu (m)</label>
            <input type="number" id="hc-cta-len" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-cta-board-w">Tahta Genişliği (cm)</label>
            <input type="number" id="hc-cta-board-w" placeholder="Örn: 10" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cta-gap">Tahta Arası Boşluk (cm)</label>
            <input type="number" id="hc-cta-gap" placeholder="Örn: 2" value="2">
        </div>
        <button class="hc-btn" onclick="hcCTAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cta-result">
            <div class="hc-result-label">Gereken Toplam Tahta:</div>
            <div class="hc-result-value" id="hc-cta-val">-</div>
            <div class="hc-result-note">Hesaplama seçilen aralığa göre yapılmıştır.</div>
        </div>
    </div>
    <?php
}
