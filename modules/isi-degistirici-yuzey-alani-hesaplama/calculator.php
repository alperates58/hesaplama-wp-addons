<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_degistirici_yuzey_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hx-area',
        HC_PLUGIN_URL . 'modules/isi-degistirici-yuzey-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hx-area">
        <h3>Isı Değiştirici Alan Hesaplama</h3>
        <p><small>A = Q / (U × LMTD)</small></p>
        
        <div class="hc-form-group">
            <label>Isı Transfer Yükü (Q, Watt)</label>
            <input type="number" id="hc-ha-q" placeholder="W" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Isı Transfer Katsayısı (U, W/m²·K)</label>
            <input type="number" id="hc-ha-u" placeholder="W/m²·K" step="1" value="500">
        </div>
        
        <div class="hc-form-group">
            <label>Log. Ort. Sıcaklık Farkı (LMTD, K)</label>
            <input type="number" id="hc-ha-lmtd" placeholder="K" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcHxAreaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ha-result">
            <span>Gereken Yüzey Alanı (A):</span>
            <div class="hc-result-value" id="hc-ha-res-val">0 m²</div>
        </div>
    </div>
    <?php
}
