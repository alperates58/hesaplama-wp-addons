<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapasitans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cap-calc',
        HC_PLUGIN_URL . 'modules/kapasitans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cap-calc">
        <h3>Kapasitans (Sığa) Hesaplama</h3>
        <p><small>C = ε × (A / d)</small></p>
        
        <div class="hc-form-group">
            <label>Levha Alanı (A, cm²)</label>
            <input type="number" id="hc-cc-area" placeholder="cm²" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Levha Uzaklığı (d, mm)</label>
            <input type="number" id="hc-cc-dist" placeholder="mm" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Yalıtkan (Dielektrik) Malzeme</label>
            <select id="hc-cc-eps">
                <option value="1">Hava / Vakum (εr = 1.0)</option>
                <option value="2.1">Teflon (εr = 2.1)</option>
                <option value="3.4">Naylon (εr = 3.4)</option>
                <option value="3.7">Kağıt (εr = 3.7)</option>
                <option value="4.5">Cam (εr = 4.5)</option>
                <option value="6">Mika (εr = 6.0)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCapacitanceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cc-result">
            <span>Hesaplanan Kapasite (C):</span>
            <div class="hc-result-value" id="hc-cc-res-val">0 pF</div>
            <div id="hc-cc-res-uf" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 μF</div>
        </div>
    </div>
    <?php
}
