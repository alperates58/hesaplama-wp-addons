<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_indirgenmis_nakit_akisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dcf-calc',
        HC_PLUGIN_URL . 'modules/indirgenmis-nakit-akisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dcf-calc-css',
        HC_PLUGIN_URL . 'modules/indirgenmis-nakit-akisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dcf">
        <h3>İndirgenmiş Nakit Akışı (DCF)</h3>
        <div class="hc-form-group">
            <label for="hc-dcf-wacc">İskonto Oranı / WACC (%)</label>
            <input type="number" id="hc-dcf-wacc" placeholder="Örn: 20">
        </div>
        <div id="hc-dcf-cashflows">
            <div class="hc-dcf-row">
                <label>1. Yıl Serbest Nakit Akışı (₺)</label>
                <input type="number" class="hc-dcf-cf" placeholder="₺">
            </div>
            <div class="hc-dcf-row">
                <label>2. Yıl Serbest Nakit Akışı (₺)</label>
                <input type="number" class="hc-dcf-cf" placeholder="₺">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcDcfSatirEkle()" style="margin-bottom: 10px;">+ Yıl Ekle</button>
        <div class="hc-form-group">
            <label for="hc-dcf-terminal">Terminal Değer (Vade Sonu Değeri ₺)</label>
            <input type="number" id="hc-dcf-terminal" placeholder="Örn: 1.000.000">
        </div>
        <button class="hc-btn" onclick="hcDcfHesapla()">DCF Değerini Hesapla</button>
        <div class="hc-result" id="hc-dcf-result">
            <div class="hc-result-item">
                <span>Varlığın Toplam Değeri (DCF):</span>
                <strong class="hc-result-value" id="hc-dcf-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
