<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_izmariti_kirlilik_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sigara-izmariti-kirlilik-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/sigara-izmariti-kirlilik-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigara-izmariti-kirlilik-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sigara-izmariti-kirlilik-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-butt-pollution">
        <h3>Sigara İzmariti Kirlilik Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-sb-count">Yıllık Tüketilen Sigara (Adet)</label>
            <input type="number" id="hc-sb-count" placeholder="Örn: 3650">
        </div>
        <div class="hc-form-group">
            <label for="hc-sb-percent">Doğaya Atılma Oranı (%)</label>
            <input type="number" id="hc-sb-percent" value="30">
        </div>
        <button class="hc-btn" onclick="hcSigaraİzmaritiKirlilikEtkisiHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-sb-result">
            <div id="hc-sb-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
