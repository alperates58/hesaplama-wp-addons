<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bolum_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bolum-hesaplama', HC_PLUGIN_URL . 'modules/bolum-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bolum-hesaplama-css', HC_PLUGIN_URL . 'modules/bolum-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bolum-hesaplama">
        <h3>Bölüm Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bol-bolunen">Bölünen (a)</label>
            <input type="number" id="hc-bol-bolunen" placeholder="örn. 47" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bol-bolen">Bölen (b)</label>
            <input type="number" id="hc-bol-bolen" placeholder="örn. 5" step="1" />
        </div>
        <button class="hc-btn" onclick="hcBolumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bolum-hesaplama-result"></div>
    </div>
    <?php
}
