<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_menzil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-range',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-menzil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evm-box">
        <h3>EV Menzil Hesaplama</h3>
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (kWh)</label>
            <input type="number" id="hc-evm-capacity" value="75">
        </div>
        <div class="hc-form-group">
            <label>Mevcut Şarj (%)</label>
            <input type="number" id="hc-evm-charge" value="100">
        </div>
        <div class="hc-form-group">
            <label>Ortalama Tüketim (kWh/100km)</label>
            <input type="number" step="0.1" id="hc-evm-cons" value="18.5">
        </div>
        <button class="hc-btn" onclick="hcEvmHesapla()">Menzili Hesapla</button>
        <div class="hc-result" id="hc-evm-result">
            <div class="hc-result-title">Tahmini Menzil:</div>
            <div class="hc-result-value" id="hc-evm-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Hava sıcaklığı, hız ve yol eğimi menzili önemli ölçüde etkiler.</p>
        </div>
    </div>
    <?php
}
