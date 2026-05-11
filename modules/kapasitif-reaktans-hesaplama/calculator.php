<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapasitif_reaktans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cap-react',
        HC_PLUGIN_URL . 'modules/kapasitif-reaktans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cap-react">
        <h3>Kapasitif Reaktans (XC) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Frekans (f, Hz)</label>
            <input type="number" id="hc-xc-f" placeholder="Hz" step="1" value="50">
        </div>
        
        <div class="hc-form-group">
            <label>Kapasite (C)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-xc-c" placeholder="Değer" step="0.001" style="flex:1;">
                <select id="hc-xc-unit" style="width: 80px;">
                    <option value="1">F</option>
                    <option value="0.001">mF</option>
                    <option value="0.000001" selected>μF</option>
                    <option value="0.000000001">nF</option>
                    <option value="0.000000000001">pF</option>
                </select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcCapReactHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-xc-result">
            <span>Kapasitif Reaktans (XC):</span>
            <div class="hc-result-value" id="hc-xc-res-val">0 Ω</div>
            <small>Formül: XC = 1 / (2 × π × f × C)</small>
        </div>
    </div>
    <?php
}
