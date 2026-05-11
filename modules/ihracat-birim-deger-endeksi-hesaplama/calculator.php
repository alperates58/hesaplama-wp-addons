<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ihracat_birim_deger_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ihracat-birim-deger-endeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/ihracat-birim-deger-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ihracat-birim-deger-endeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ihracat-birim-deger-endeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ihracat-birim-deger">
        <h3>İhracat Birim Değer Endeksi</h3>
        <div class="hc-form-group">
            <label for="hc-ibd-current-val">Cari Dönem İhracat Tutarı ($)</label>
            <input type="number" id="hc-ibd-current-val" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ibd-current-qty">Cari Dönem İhracat Miktarı (kg/Adet)</label>
            <input type="number" id="hc-ibd-current-qty" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ibd-base-val">Temel Dönem İhracat Tutarı ($)</label>
            <input type="number" id="hc-ibd-base-val" placeholder="Örn: 40.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ibd-base-qty">Temel Dönem İhracat Miktarı (kg/Adet)</label>
            <input type="number" id="hc-ibd-base-qty" placeholder="Örn: 10.000">
        </div>
        <button class="hc-btn" onclick="hcIbdHesapla()">Endeksi Hesapla</button>
        <div class="hc-result" id="hc-ibd-result">
            <div class="hc-result-item">
                <span>Birim Değer Endeksi:</span>
                <strong class="hc-result-value" id="hc-ibd-value">-</strong>
            </div>
            <p id="hc-ibd-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
