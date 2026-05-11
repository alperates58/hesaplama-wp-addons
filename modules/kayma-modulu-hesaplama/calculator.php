<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kayma_modulu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shear-modulus',
        HC_PLUGIN_URL . 'modules/kayma-modulu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-shear-modulus">
        <h3>Kayma Modülü (Rijitlik) Hesaplama</h3>
        <p><small>G = τ / γ</small></p>
        
        <div class="hc-form-group">
            <label>Kayma Gerilmesi (τ, MPa)</label>
            <input type="number" id="hc-sm-tau" placeholder="MPa" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kayma Şekil Değiştirmesi (γ, radyan)</label>
            <input type="number" id="hc-sm-gamma" placeholder="γ" step="0.0001">
        </div>
        
        <button class="hc-btn" onclick="hcShearModulusHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sm-result">
            <span>Kayma Modülü (G):</span>
            <div class="hc-result-value" id="hc-sm-res-val">0 GPa</div>
        </div>
    </div>
    <?php
}
