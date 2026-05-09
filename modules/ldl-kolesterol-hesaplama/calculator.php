<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ldl_kolesterol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ldl-calc',
        HC_PLUGIN_URL . 'modules/ldl-kolesterol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ldl-box">
        <h3>LDL Kolesterol Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ldl-total">Toplam Kolesterol (mg/dL)</label>
            <input type="number" id="hc-ldl-total" placeholder="Örn: 200">
        </div>

        <div class="hc-form-group">
            <label for="hc-ldl-hdl">HDL (İyi Kolesterol - mg/dL)</label>
            <input type="number" id="hc-ldl-hdl" placeholder="Örn: 50">
        </div>

        <div class="hc-form-group">
            <label for="hc-ldl-tri">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-ldl-tri" placeholder="Örn: 150">
        </div>

        <button class="hc-btn" onclick="hcLDLHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ldl-calc-result">
            <div class="hc-result-item">
                <span>Tahmini LDL Değeri:</span>
                <div class="hc-result-value" id="hc-ldl-val">-</div>
            </div>
            <div id="hc-ldl-status" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px;">
                *Friedewald formülü kullanılmıştır. Trigliserid değeri 400 mg/dL üzerindeyse bu formül güvenilir değildir.
            </p>
        </div>
    </div>
    <?php
}
