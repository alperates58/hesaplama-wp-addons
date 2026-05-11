<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiralik_gayrimenkul_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kiralik-gayrimenkul-getirisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kiralik-gayrimenkul-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kiralik-gayrimenkul-getirisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kiralik-gayrimenkul-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kiralik-gayrimenkul-getirisi">
        <h3>Kiralık Gayrimenkul Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kgg-price">Gayrimenkul Fiyatı (₺)</label>
            <input type="number" id="hc-kgg-price" placeholder="Örn: 5.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kgg-rent">Aylık Kira Geliri (₺)</label>
            <input type="number" id="hc-kgg-rent" placeholder="Örn: 25.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kgg-expenses">Yıllık Giderler (Vergi, Aidat, Bakım ₺)</label>
            <input type="number" id="hc-kgg-expenses" placeholder="Örn: 15.000">
        </div>
        <button class="hc-btn" onclick="hcKiralikGayrimenkulGetirisiHesapla()">Verimi Hesapla</button>
        <div class="hc-result" id="hc-kgg-result">
            <div class="hc-result-item">
                <span>Brüt Yıllık Verim:</span>
                <strong id="hc-kgg-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Yıllık Verim:</span>
                <strong class="hc-result-value" id="hc-kgg-net">-</strong>
            </div>
            <p class="hc-small-text">Net verim, yıllık kira gelirinden giderler düşüldükten sonra hesaplanır.</p>
        </div>
    </div>
    <?php
}
