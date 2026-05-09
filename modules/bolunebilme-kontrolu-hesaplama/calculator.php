<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bolunebilme_kontrolu_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bolunebilme-kontrolu-hesaplama', HC_PLUGIN_URL . 'modules/bolunebilme-kontrolu-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bolunebilme-kontrolu-hesaplama-css', HC_PLUGIN_URL . 'modules/bolunebilme-kontrolu-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bolunebilme-kontrolu-hesaplama">
        <h3>Bölünebilme Kontrolü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bkr-sayi">Kontrol Edilecek Sayı</label>
            <input type="number" id="hc-bkr-sayi" placeholder="örn. 360" step="1" />
        </div>
        <button class="hc-btn" onclick="hcBolunebilmeKontrolHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-bolunebilme-kontrolu-hesaplama-result"></div>
    </div>
    <?php
}
