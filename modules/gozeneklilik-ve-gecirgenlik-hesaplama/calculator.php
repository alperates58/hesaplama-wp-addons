<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gozeneklilik_ve_gecirgenlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-porosity-calc',
        HC_PLUGIN_URL . 'modules/gozeneklilik-ve-gecirgenlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-porosity-calc">
        <h3>Gözeneklilik (Porozite) Hesaplama</h3>
        <p><small>n = (V_boşluk / V_toplam) × 100</small></p>
        
        <div class="hc-form-group">
            <label>Boşluk Hacmi (Vv, cm³)</label>
            <input type="number" id="hc-po-vv" placeholder="cm³" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Hacim (Vt, cm³)</label>
            <input type="number" id="hc-po-vt" placeholder="cm³" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcPorosityHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-po-result">
            <span>Gözeneklilik Oranı (n):</span>
            <div class="hc-result-value" id="hc-po-res-val">%0</div>
            <div id="hc-po-res-void" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Boşluk Oranı (e): 0</div>
        </div>
    </div>
    <?php
}
