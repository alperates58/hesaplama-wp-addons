<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vinil_cit_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vinyl-fence',
        HC_PLUGIN_URL . 'modules/vinil-cit-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vinyl-fence-css',
        HC_PLUGIN_URL . 'modules/vinil-cit-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vinyl-fence">
        <h3>Vinil Çit Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vf-length">Toplam Çit Uzunluğu (m):</label>
            <input type="number" id="hc-vf-length" step="0.1" placeholder="30.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vf-panel">Panel Genişliği (m):</label>
            <input type="number" id="hc-vf-panel" step="0.01" value="2.44">
            <small>Standart: 2.44 m (8 feet)</small>
        </div>
        <button class="hc-btn" onclick="hcVinylFenceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vinyl-fence-result">
            <div class="hc-fence-grid">
                <div class="hc-fence-item">
                    <strong>Panel Sayısı</strong>
                    <div id="hc-vf-res-panels">-</div>
                    <span>Adet</span>
                </div>
                <div class="hc-fence-item">
                    <strong>Direk Sayısı</strong>
                    <div id="hc-vf-res-posts">-</div>
                    <span>Adet</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
