<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bolenleri_bulma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bolenleri-bulma-hesaplama', HC_PLUGIN_URL . 'modules/bolenleri-bulma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bolenleri-bulma-hesaplama-css', HC_PLUGIN_URL . 'modules/bolenleri-bulma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bolenleri-bulma-hesaplama">
        <h3>Bölenleri Bulma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bbb-sayi">Sayı</label>
            <input type="number" id="hc-bbb-sayi" placeholder="örn. 36" min="1" step="1" />
        </div>
        <button class="hc-btn" onclick="hcBolenleriHesapla()">Bölenleri Bul</button>
        <div class="hc-result" id="hc-bolenleri-bulma-hesaplama-result"></div>
    </div>
    <?php
}
