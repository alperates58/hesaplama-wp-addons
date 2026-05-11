<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_denge_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-eq',
        HC_PLUGIN_URL . 'modules/isil-denge-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-eq">
        <h3>Isıl Denge (Karışım) Hesaplama</h3>
        
        <div style="display: flex; gap: 10px;">
            <div style="flex:1;">
                <h4>Madde 1</h4>
                <div class="hc-form-group">
                    <label>Kütle (m1, kg)</label>
                    <input type="number" id="hc-te-m1" placeholder="kg" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Özgül Isı (c1)</label>
                    <input type="number" id="hc-te-c1" placeholder="kJ/kgK" step="0.01" value="4.18">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T1, °C)</label>
                    <input type="number" id="hc-te-t1" placeholder="°C" step="0.1">
                </div>
            </div>
            <div style="flex:1;">
                <h4>Madde 2</h4>
                <div class="hc-form-group">
                    <label>Kütle (m2, kg)</label>
                    <input type="number" id="hc-te-m2" placeholder="kg" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Özgül Isı (c2)</label>
                    <input type="number" id="hc-te-c2" placeholder="kJ/kgK" step="0.01" value="4.18">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T2, °C)</label>
                    <input type="number" id="hc-te-t2" placeholder="°C" step="0.1">
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcThermalEqHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-te-result">
            <span>Son Denge Sıcaklığı (Tson):</span>
            <div class="hc-result-value" id="hc-te-res-val">0 °C</div>
        </div>
    </div>
    <?php
}
