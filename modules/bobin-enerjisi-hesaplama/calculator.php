<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bobin_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bobin-enerji',
        HC_PLUGIN_URL . 'modules/bobin-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bobin-enerji">
        <h3>Bobin Enerjisi Hesaplama</h3>
        <p><small>E = ½ · L · I²</small></p>
        
        <div class="hc-form-group">
            <label>İndüktans (L, Henry veya mH)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-be-l" placeholder="L" step="0.001" style="flex:1;">
                <select id="hc-be-l-unit" style="width:80px;">
                    <option value="1">H</option>
                    <option value="0.001">mH</option>
                    <option value="0.000001">μH</option>
                </select>
            </div>
        </div>
        
        <div class="hc-form-group">
            <label>Akım (I, Amper)</label>
            <input type="number" id="hc-be-i" placeholder="I" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBobinEnerjisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-be-result">
            <span>Depolanan Enerji (E):</span>
            <div class="hc-result-value" id="hc-be-res-j">0 Joule</div>
            <div id="hc-be-res-mj" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 mJ</div>
        </div>
    </div>
    <?php
}
