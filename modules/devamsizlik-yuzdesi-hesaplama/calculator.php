<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_devamsizlik_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-devamsizlik-yuzdesi-hesaplama', HC_PLUGIN_URL . 'modules/devamsizlik-yuzdesi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-devamsizlik-yuzdesi-hesaplama-css', HC_PLUGIN_URL . 'modules/devamsizlik-yuzdesi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-devamsizlik-yuzdesi-hesaplama">
        <h3>Devamsızlık Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dyh-toplam">Toplam Ders/Saat Sayısı</label>
            <input type="number" id="hc-dyh-toplam" placeholder="örn. 160" min="1" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dyh-devamsiz">Devamsız Kalınan Ders/Saat Sayısı</label>
            <input type="number" id="hc-dyh-devamsiz" placeholder="örn. 24" min="0" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dyh-sinir">Devamsızlık Sınırı (%)</label>
            <input type="number" id="hc-dyh-sinir" placeholder="örn. 20" value="20" min="0" max="100" step="1" />
        </div>
        <button class="hc-btn" onclick="hcDevamsizlikYuzdesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-devamsizlik-yuzdesi-hesaplama-result"></div>
    </div>
    <?php
}
