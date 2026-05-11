<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karlilik_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karlilik-endeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/karlilik-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karlilik-endeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karlilik-endeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karlilik-endeksi">
        <h3>Karlılık Endeksi Hesaplama (PI)</h3>
        <div class="hc-form-group">
            <label for="hc-pi-pv">Gelecekteki Nakit Akışlarının Bugünkü Değeri (₺)</label>
            <input type="number" id="hc-pi-pv" placeholder="Örn: 120.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pi-investment">İlk Yatırım Tutarı (₺)</label>
            <input type="number" id="hc-pi-investment" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcKarlilikEndeksiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pi-result">
            <div class="hc-result-item">
                <span>Karlılık Endeksi (PI):</span>
                <strong class="hc-result-value" id="hc-pi-value">-</strong>
            </div>
            <p id="hc-pi-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
