<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lc_filtre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lc-calc',
        HC_PLUGIN_URL . 'modules/lc-filtre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lc-calc">
        <h3>LC Filtre / Rezonans Hesaplama</h3>
        <p><small>f = 1 / (2π × √(L × C))</small></p>
        
        <div class="hc-form-group">
            <label>Endüktans (L)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-lc-l" placeholder="Değer" step="0.001" style="flex:1;">
                <select id="hc-lc-lunit" style="width: 80px;">
                    <option value="1">H</option>
                    <option value="0.001" selected>mH</option>
                    <option value="0.000001">μH</option>
                </select>
            </div>
        </div>
        
        <div class="hc-form-group">
            <label>Kapasite (C)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-lc-c" placeholder="Değer" step="0.001" style="flex:1;">
                <select id="hc-lc-cunit" style="width: 80px;">
                    <option value="1">F</option>
                    <option value="0.001">mF</option>
                    <option value="0.000001" selected>μF</option>
                    <option value="0.000000001">nF</option>
                </select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcLcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lc-result">
            <span>Rezonans Frekansı (f):</span>
            <div class="hc-result-value" id="hc-lc-res-val">0 Hz</div>
        </div>
    </div>
    <?php
}
