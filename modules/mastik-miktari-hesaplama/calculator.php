<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mastik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sealant-calc',
        HC_PLUGIN_URL . 'modules/mastik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sealant-calc-css',
        HC_PLUGIN_URL . 'modules/mastik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sealant">
        <h3>Mastik / Silikon Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-sc-length">Toplam Derz Uzunluğu (m):</label>
            <input type="number" id="hc-sc-length" step="0.1" placeholder="10.0">
        </div>
        <div class="hc-sc-row">
            <div class="hc-form-group">
                <label>Genişlik (mm):</label>
                <input type="number" id="hc-sc-width" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>Derinlik (mm):</label>
                <input type="number" id="hc-sc-depth" placeholder="5">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-tube">Tüp Hacmi (ml):</label>
            <input type="number" id="hc-sc-tube" value="310">
            <small>Standart kartuş: 310 ml</small>
        </div>
        <button class="hc-btn" onclick="hcSealantCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sealant-result">
            <strong>Gereken Tüp Sayısı:</strong>
            <div id="hc-sc-res-val" class="hc-result-value">-</div>
            <span>Adet Kartuş</span>
        </div>
    </div>
    <?php
}
