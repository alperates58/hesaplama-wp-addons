<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mahremiyet_citi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-privacy-fence',
        HC_PLUGIN_URL . 'modules/mahremiyet-citi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-privacy-fence-css',
        HC_PLUGIN_URL . 'modules/mahremiyet-citi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-privacy-fence">
        <h3>Mahremiyet Çiti Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-pf-length">Toplam Uzunluk (m):</label>
            <input type="number" id="hc-pf-length" step="0.1" placeholder="20.0">
        </div>
        <div class="hc-pf-row">
            <div class="hc-form-group">
                <label>Tahta Genişliği (cm):</label>
                <input type="number" id="hc-pf-width" value="10">
            </div>
            <div class="hc-form-group">
                <label>Aralık (cm):</label>
                <input type="number" id="hc-pf-gap" value="0">
                <small>0 = Tam kapalı</small>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPrivacyFenceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-privacy-fence-result">
            <strong>Gereken Dikey Tahta Sayısı:</strong>
            <div id="hc-pf-res-val" class="hc-result-value">-</div>
            <span>Adet</span>
        </div>
    </div>
    <?php
}
