<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_darcy_weisbach_basinc_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-darcy-weisbach',
        HC_PLUGIN_URL . 'modules/darcy-weisbach-basinc-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-darcy-weisbach">
        <h3>Darcy-Weisbach Basınç Kaybı Hesaplama</h3>
        <p><small>h<sub>f</sub> = f · (L/D) · (v² / 2g)</small></p>
        
        <div class="hc-form-group">
            <label>Boru Uzunluğu (L, m)</label>
            <input type="number" id="hc-dw-l" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Boru İç Çapı (D, mm)</label>
            <input type="number" id="hc-dw-d" placeholder="mm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Akış Hızı (v, m/s)</label>
            <input type="number" id="hc-dw-v" placeholder="m/s" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Sürtünme Faktörü (f)</label>
            <input type="number" id="hc-dw-f" value="0.02" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcDarcyWeisbachHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dw-result">
            <span>Sürtünme Yük Kaybı (h<sub>f</sub>):</span>
            <div class="hc-result-value" id="hc-dw-res-m">0 m</div>
            <div id="hc-dw-res-pa" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Pa</div>
        </div>
    </div>
    <?php
}
