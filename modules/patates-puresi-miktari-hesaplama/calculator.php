<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_patates_puresi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-potato-puree-js',
        HC_PLUGIN_URL . 'modules/patates-puresi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-potato-puree-css',
        HC_PLUGIN_URL . 'modules/patates-puresi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-potato-puree">
        <h3>Patates Püresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ppm-count">Kişi Sayısı</label>
            <input type="number" id="hc-ppm-count" value="4" min="1">
        </div>

        <button class="hc-btn" onclick="hcPureeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-potato-puree-result">
            <div class="hc-result-item">
                <span>Gereken Patates:</span>
                <strong id="hc-ppm-res-potato">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tereyağı:</span>
                <strong id="hc-ppm-res-butter">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Süt:</span>
                <strong id="hc-ppm-res-milk">-</strong>
            </div>
        </div>
    </div>
    <?php
}
