<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ahsap_kaplama_tahta_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ahsap-kaplama-tahta-araligi-hesaplama',
        HC_PLUGIN_URL . 'modules/ahsap-kaplama-tahta-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ahsap-kaplama-tahta-araligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ahsap-kaplama-tahta-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ahsap-kaplama-tahta-araligi-hesaplama">
        <h3>Tahta Aralığı (Boşluk) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ata-total">Toplam Uzunluk (cm)</label>
            <input type="number" id="hc-ata-total" placeholder="Örn: 200" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ata-width">Tahta Genişliği (cm)</label>
            <input type="number" id="hc-ata-width" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ata-count">Tahta Sayısı</label>
            <input type="number" id="hc-ata-count" placeholder="Örn: 15">
        </div>
        <button class="hc-btn" onclick="hcATAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ata-result">
            <div class="hc-result-label">Net Boşluk Mesafesi:</div>
            <div class="hc-result-value" id="hc-ata-val">-</div>
            <div class="hc-result-note">Her tahta arasına bu mesafeyi bırakmalısınız.</div>
        </div>
    </div>
    <?php
}
