<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enduktif_reaktans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ind-react',
        HC_PLUGIN_URL . 'modules/enduktif-reaktans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ind-react">
        <h3>Endüktif Reaktans (XL) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Frekans (f, Hz)</label>
            <input type="number" id="hc-xl-f" placeholder="Hz" step="1" value="50">
        </div>
        
        <div class="hc-form-group">
            <label>Endüktans (L)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-xl-l" placeholder="Değer" step="0.001" style="flex:1;">
                <select id="hc-xl-unit" style="width: 80px;">
                    <option value="1">H</option>
                    <option value="0.001" selected>mH</option>
                    <option value="0.000001">μH</option>
                </select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcIndReactHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-xl-result">
            <span>Endüktif Reaktans (XL):</span>
            <div class="hc-result-value" id="hc-xl-res-val">0 Ω</div>
            <small>Formül: XL = 2 × π × f × L</small>
        </div>
    </div>
    <?php
}
