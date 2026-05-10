<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geometrik_dizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-geo-seq',
        HC_PLUGIN_URL . 'modules/geometrik-dizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-geo-seq-css',
        HC_PLUGIN_URL . 'modules/geometrik-dizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-geo-seq">
        <h3>Geometrik Dizi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gs-a1">İlk Terim (a₁):</label>
            <input type="number" id="hc-gs-a1" step="0.01" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-gs-r">Ortak Çarpan (r):</label>
            <input type="number" id="hc-gs-r" step="0.01" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-gs-n">Terim Sayısı (n):</label>
            <input type="number" id="hc-gs-n" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcGeoSeqHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-geo-seq-result">
            <div class="hc-gs-grid">
                <div class="hc-gs-item">
                    <strong>n. Terim</strong>
                    <div id="hc-gs-res-term">-</div>
                </div>
                <div class="hc-gs-item">
                    <strong>Toplam (Sₙ)</strong>
                    <div id="hc-gs-res-sum">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
