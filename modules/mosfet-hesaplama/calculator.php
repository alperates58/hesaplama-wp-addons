<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mosfet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mosfet',
        HC_PLUGIN_URL . 'modules/mosfet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mosfet">
        <h3>MOSFET Doyma Akımı Hesaplama</h3>
        <p class="hc-desc">Doyma bölgesi (Saturation) için I<sub>D</sub> hesabı.</p>
        
        <div class="hc-form-group">
            <label for="hc-mf-k">İletkenlik Parametresi (k' * W/L - mA/V²)</label>
            <input type="number" id="hc-mf-k" placeholder="mA/V²" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mf-vgs">Gate-Source Gerilimi (V<sub>GS</sub> - Volt)</label>
            <input type="number" id="hc-mf-vgs" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mf-vth">Eşik Gerilimi (V<sub>th</sub> - Volt)</label>
            <input type="number" id="hc-mf-vth" placeholder="V" step="any">
        </div>

        <button class="hc-btn" onclick="hcMosfetHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mf-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Drenaj Akımı (I<sub>D</sub>):</span>
                <span class="hc-result-value" id="hc-mf-res-total">--</span>
                <span class="hc-result-unit">mA</span>
            </div>
        </div>
    </div>
    <?php
}
