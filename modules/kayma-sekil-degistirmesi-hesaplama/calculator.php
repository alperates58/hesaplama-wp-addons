<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kayma_sekil_degistirmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shear-strain',
        HC_PLUGIN_URL . 'modules/kayma-sekil-degistirmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-shear-strain">
        <h3>Kayma Şekil Değiştirmesi (γ) Hesaplama</h3>
        <p><small>γ = Δx / L</small></p>
        
        <div class="hc-form-group">
            <label>Yatay Yer Değiştirme (Δx, mm)</label>
            <input type="number" id="hc-sn-dx" placeholder="mm" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Malzeme Yüksekliği (L, mm)</label>
            <input type="number" id="hc-sn-l" placeholder="mm" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcShearStrainHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sn-result">
            <span>Kayma Şekil Değiştirmesi (γ):</span>
            <div class="hc-result-value" id="hc-sn-res-val">0 rad</div>
        </div>
    </div>
    <?php
}
