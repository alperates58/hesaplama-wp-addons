<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_buyume_orani_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-buyume-orani-hesaplama', HC_PLUGIN_URL . 'modules/buyume-orani-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-buyume-orani-hesaplama-css', HC_PLUGIN_URL . 'modules/buyume-orani-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-buyume-orani-hesaplama">
        <h3>Büyüme Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-buo-eski">Başlangıç Değeri</label>
            <input type="number" id="hc-buo-eski" placeholder="örn. 100" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-buo-yeni">Bitiş Değeri</label>
            <input type="number" id="hc-buo-yeni" placeholder="örn. 150" step="any" />
        </div>
        <button class="hc-btn" onclick="hcBuyumeOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-buyume-orani-hesaplama-result"></div>
    </div>
    <?php
}
