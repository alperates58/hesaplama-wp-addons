<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_kopya_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-kopya-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-kopya-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-kopya-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-kopya-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-kopya-sayisi-hesaplama">
        <h3>DNA Kopya Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-copy-amount">DNA Miktarı (ng)</label>
            <input type="number" id="hc-copy-amount" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-copy-length">DNA Uzunluğu (bp)</label>
            <input type="number" id="hc-copy-length" placeholder="Örn: 3000" step="any">
        </div>
        <button class="hc-btn" onclick="hcDNAKopyaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-copy-result">
            <div class="hc-result-label">Toplam Kopya Sayısı:</div>
            <div class="hc-result-value" id="hc-copy-val">-</div>
            <div class="hc-result-note">
                Formül: (Miktar * 6.022x10²³) / (Uzunluk * 10⁹ * 660)
            </div>
        </div>
    </div>
    <?php
}
