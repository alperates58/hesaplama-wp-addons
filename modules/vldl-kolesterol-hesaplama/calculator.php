<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vldl_kolesterol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vldl-calc',
        HC_PLUGIN_URL . 'modules/vldl-kolesterol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vldl-box">
        <h3>VLDL Kolesterol Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-vldl-tri">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-vldl-tri" placeholder="Örn: 150">
        </div>

        <button class="hc-btn" onclick="hcVLDLHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-vldl-calc-result">
            <div class="hc-result-item">
                <span>Tahmini VLDL Değeri:</span>
                <div class="hc-result-value" id="hc-vldl-val">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *VLDL değeri genellikle trigliserid miktarının 5'te biri olarak hesaplanır (Trigliserid < 400 mg/dL ise).
            </p>
        </div>
    </div>
    <?php
}
