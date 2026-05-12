<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tereyagi_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-butter-size-js',
        HC_PLUGIN_URL . 'modules/tereyagi-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-butter-size-css',
        HC_PLUGIN_URL . 'modules/tereyagi-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-butter-size">
        <h3>Tereyağı Ölçü Rehberi</h3>
        
        <div class="hc-form-group">
            <label for="hc-bs-spoon">Yemek Kaşığı Sayısı</label>
            <input type="number" id="hc-bs-spoon" value="1" min="0" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcTereyagiOlcusuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-butter-size-result">
            <div class="hc-result-item">
                <span>Yaklaşık Ağırlık:</span>
                <strong class="hc-result-value" id="hc-bs-res-val">-</strong>
            </div>
            <div class="hc-quick-ref">
                <p>1 Yemek Kaşığı ≈ 14g</p>
                <p>1 Su Bardağı ≈ 225g</p>
                <p>1 Paket ≈ 250g</p>
            </div>
        </div>
    </div>
    <?php
}
