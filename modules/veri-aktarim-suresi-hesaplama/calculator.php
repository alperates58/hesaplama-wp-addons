<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_veri_aktarim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-data-transfer',
        HC_PLUGIN_URL . 'modules/veri-aktarim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-data-transfer-css',
        HC_PLUGIN_URL . 'modules/veri-aktarim-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-data-transfer">
        <h3>Veri Aktarım Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-dt-size">Dosya Boyutu [GB]</label>
            <input type="number" id="hc-dt-size" value="10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-dt-speed">Hız (Bandwidth) [Mbps]</label>
            <input type="number" id="hc-dt-speed" value="100" min="1">
        </div>
        <button class="hc-btn" onclick="hcDataTransferHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-data-transfer-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <span class="hc-result-value" id="hc-res-dt-val">0 saniye</span>
            </div>
            <p class="hc-dt-note">Not: 1 GB = 8000 Mbit olarak hesaplanır.</p>
        </div>
    </div>
    <?php
}
