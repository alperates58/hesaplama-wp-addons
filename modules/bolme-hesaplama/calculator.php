<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bolme_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bolme-hesaplama', HC_PLUGIN_URL . 'modules/bolme-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bolme-hesaplama-css', HC_PLUGIN_URL . 'modules/bolme-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bolme-hesaplama">
        <h3>Bölme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-blm-bolunen">Bölünen</label>
            <input type="number" id="hc-blm-bolunen" placeholder="örn. 125" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-blm-bolen">Bölen</label>
            <input type="number" id="hc-blm-bolen" placeholder="örn. 7" step="any" />
        </div>
        <button class="hc-btn" onclick="hcBolmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bolme-hesaplama-result"></div>
    </div>
    <?php
}
