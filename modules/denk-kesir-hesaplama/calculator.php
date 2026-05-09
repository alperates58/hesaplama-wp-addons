<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_denk_kesir_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-denk-kesir-hesaplama', HC_PLUGIN_URL . 'modules/denk-kesir-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-denk-kesir-hesaplama-css', HC_PLUGIN_URL . 'modules/denk-kesir-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-denk-kesir-hesaplama">
        <h3>Denk Kesir Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dkr-pay">Pay (a)</label>
            <input type="number" id="hc-dkr-pay" placeholder="örn. 2" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dkr-payda">Payda (b)</label>
            <input type="number" id="hc-dkr-payda" placeholder="örn. 3" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dkr-carpan">Kaç Adet Denk Kesir Üretilsin?</label>
            <input type="number" id="hc-dkr-carpan" placeholder="örn. 5" min="1" max="20" value="5" step="1" />
        </div>
        <button class="hc-btn" onclick="hcDenkKesirHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-denk-kesir-hesaplama-result"></div>
    </div>
    <?php
}
