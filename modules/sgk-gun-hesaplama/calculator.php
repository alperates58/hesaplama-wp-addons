<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sgk_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sgk-gun',
        HC_PLUGIN_URL . 'modules/sgk-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sgk-gun-css',
        HC_PLUGIN_URL . 'modules/sgk-gun-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sgk-gun-hesaplama">
        <h3>SGK Gün Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sgh-start">İşe Başlama Tarihi</label>
            <input type="date" id="hc-sgh-start">
        </div>

        <div class="hc-form-group">
            <label for="hc-sgh-end">İşten Ayrılış Tarihi</label>
            <input type="date" id="hc-sgh-end">
        </div>
        
        <button class="hc-btn" onclick="hcSGKGunHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sgk-gun-result">
            <div class="hc-result-item">
                <span>Hesaplama Mantığı:</span>
                <strong>Her Ay 30 Gün</strong>
            </div>
            <div class="hc-result-value" id="hc-sgh-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam SGK Prim Günü</p>
        </div>
    </div>
    <?php
}
