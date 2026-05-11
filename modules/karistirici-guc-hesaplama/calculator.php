<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karistirici_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mixer-power',
        HC_PLUGIN_URL . 'modules/karistirici-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mixer-power">
        <h3>Karıştırıcı Güç Hesaplama</h3>
        <p><small>P = Np × ρ × n³ × D⁵</small></p>
        
        <div class="hc-form-group">
            <label>Güç Sayısı (Np - Impeller Constant)</label>
            <input type="number" id="hc-mp-np" placeholder="Np" step="0.1" value="5.0">
            <small>Türbin: 5.0, Pervane: 0.3</small>
        </div>
        
        <div class="hc-form-group">
            <label>Sıvı Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-mp-rho" placeholder="kg/m³" step="1" value="1000">
        </div>
        
        <div class="hc-form-group">
            <label>Karıştırma Hızı (n, RPM)</label>
            <input type="number" id="hc-mp-n" placeholder="RPM" step="1" value="100">
        </div>
        
        <div class="hc-form-group">
            <label>Çark Çapı (D, metre)</label>
            <input type="number" id="hc-mp-d" placeholder="m" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcMixerPowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mp-result">
            <span>Gereken Güç (P):</span>
            <div class="hc-result-value" id="hc-mp-res-val">0 Watt</div>
            <div id="hc-mp-res-kw" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kW</div>
        </div>
    </div>
    <?php
}
