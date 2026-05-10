<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompost_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kompost-miktar',
        HC_PLUGIN_URL . 'modules/kompost-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kompost-miktar-css',
        HC_PLUGIN_URL . 'modules/kompost-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kompost-miktar">
        <h3>Kompost İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-km-area">Uygulama Alanı (m²):</label>
            <input type="number" id="hc-km-area" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-km-depth">Uygulama Derinliği (cm):</label>
            <input type="number" id="hc-km-depth" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcKompostHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kompost-miktar-result">
            <strong>Gereken Kompost Miktarı:</strong>
            <div id="hc-km-res-val" class="hc-result-value">-</div>
            <span>Litre</span>
        </div>
    </div>
    <?php
}
