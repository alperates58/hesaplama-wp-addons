<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ahsap_duvar_kaplama_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ahsap-duvar-kaplama-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/ahsap-duvar-kaplama-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ahsap-duvar-kaplama-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ahsap-duvar-kaplama-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ahsap-duvar-kaplama-miktari-hesaplama">
        <h3>Ahşap Duvar Kaplama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-adk-area">Kaplanacak Alan (m²)</label>
            <input type="number" id="hc-adk-area" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-adk-width">Tahta Genişliği (cm)</label>
            <input type="number" id="hc-adk-width" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-adk-waste">Fire Payı (%)</label>
            <input type="number" id="hc-adk-waste" placeholder="Örn: 10" value="10">
        </div>
        <button class="hc-btn" onclick="hcADKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-adk-result">
            <div class="hc-result-label">Gereken Toplam Metraj:</div>
            <div class="hc-result-value" id="hc-adk-val">-</div>
            <div class="hc-result-note" id="hc-adk-note"></div>
        </div>
    </div>
    <?php
}
