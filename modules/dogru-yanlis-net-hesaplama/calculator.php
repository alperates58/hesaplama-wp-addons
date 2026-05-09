<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dogru_yanlis_net_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dogru-yanlis-net-hesaplama', HC_PLUGIN_URL . 'modules/dogru-yanlis-net-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dogru-yanlis-net-hesaplama-css', HC_PLUGIN_URL . 'modules/dogru-yanlis-net-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dogru-yanlis-net-hesaplama">
        <h3>Doğru Yanlış Net Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-dyn-dogru">Doğru Sayısı</label><input type="number" id="hc-dyn-dogru" placeholder="örn. 30" min="0" step="1" /></div>
        <div class="hc-form-group"><label for="hc-dyn-yanlis">Yanlış Sayısı</label><input type="number" id="hc-dyn-yanlis" placeholder="örn. 5" min="0" step="1" /></div>
        <div class="hc-form-group"><label for="hc-dyn-katsayi">Yanlış Çıkarma Katsayısı</label>
            <select id="hc-dyn-katsayi">
                <option value="0.25">1/4 (TYT/AYT)</option>
                <option value="0.33">1/3</option>
                <option value="0">Yanlış çıkarmaz</option>
                <option value="custom">Özel</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-dyn-custom-grup" style="display:none;">
            <label for="hc-dyn-custom">Özel Katsayı</label>
            <input type="number" id="hc-dyn-custom" placeholder="örn. 0.25" step="0.01" min="0" max="1" />
        </div>
        <button class="hc-btn" onclick="hcDogrusYanlisNetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogru-yanlis-net-hesaplama-result"></div>
    </div>
    <?php
}
