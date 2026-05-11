<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karisim_havasi_sicakligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-air-mix-temp',
        HC_PLUGIN_URL . 'modules/karisim-havasi-sicakligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-air-mix-temp">
        <h3>Hava Karışım Sıcaklığı Hesaplama</h3>
        <p><small>Tm = (Q₁T₁ + Q₂T₂) / (Q₁ + Q₂)</small></p>
        
        <div style="display: flex; gap: 10px;">
            <div style="flex:1;">
                <h4>Hava 1</h4>
                <div class="hc-form-group">
                    <label>Debi (Q1, m³/h)</label>
                    <input type="number" id="hc-amt-q1" placeholder="m³/h" step="10">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T1, °C)</label>
                    <input type="number" id="hc-amt-t1" placeholder="°C" step="0.1">
                </div>
            </div>
            <div style="flex:1;">
                <h4>Hava 2</h4>
                <div class="hc-form-group">
                    <label>Debi (Q2, m³/h)</label>
                    <input type="number" id="hc-amt-q2" placeholder="m³/h" step="10">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T2, °C)</label>
                    <input type="number" id="hc-amt-t2" placeholder="°C" step="0.1">
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcAirMixTempHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-amt-result">
            <span>Karışım Sıcaklığı (Tm):</span>
            <div class="hc-result-value" id="hc-amt-res-val">0 °C</div>
        </div>
    </div>
    <?php
}
