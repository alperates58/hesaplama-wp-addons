<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mahremiyet_citi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-privacy-fence',
        HC_PLUGIN_URL . 'modules/mahremiyet-citi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-privacy-fence-css',
        HC_PLUGIN_URL . 'modules/mahremiyet-citi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pfence">
        <h3>Mahremiyet Çiti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pf-len">Toplam Çit Uzunluğu (m):</label>
            <input type="number" id="hc-pf-len" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-pf-pwidth">Panel Genişliği (m):</label>
            <input type="number" id="hc-pf-pwidth" value="2.0" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPrivacyFenceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pfence-result">
            <div class="hc-pf-grid">
                <div class="hc-pf-item">
                    <strong>Panel Sayısı</strong>
                    <div id="hc-pf-res-panels">-</div>
                </div>
                <div class="hc-pf-item">
                    <strong>Direk Sayısı</strong>
                    <div id="hc-pf-res-posts">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
