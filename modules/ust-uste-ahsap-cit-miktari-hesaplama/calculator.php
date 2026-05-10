<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ust_uste_ahsap_cit_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-overlap-fence',
        HC_PLUGIN_URL . 'modules/ust-uste-ahsap-cit-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-overlap-fence-css',
        HC_PLUGIN_URL . 'modules/ust-uste-ahsap-cit-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-overlap-fence">
        <h3>Üst Üste (Overlap) Çit Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-of-height">Hedef Çit Yüksekliği (cm):</label>
            <input type="number" id="hc-of-height" placeholder="180">
        </div>
        <div class="hc-of-row">
            <div class="hc-form-group">
                <label>Tahta Genişliği (cm):</label>
                <input type="number" id="hc-of-width" value="15">
            </div>
            <div class="hc-form-group">
                <label>Bini Payı (Overlap cm):</label>
                <input type="number" id="hc-of-overlap" value="2.5">
                <small>Üst üste binen kısım.</small>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-of-length">Toplam Çit Uzunluğu (m):</label>
            <input type="number" id="hc-of-length" placeholder="10.0">
        </div>
        <button class="hc-btn" onclick="hcOverlapFenceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-overlap-fence-result">
            <strong>Gereken Toplam Tahta:</strong>
            <div id="hc-of-res-val" class="hc-result-value">-</div>
            <span>Lineer Metre</span>
        </div>
    </div>
    <?php
}
