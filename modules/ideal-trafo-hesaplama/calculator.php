<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_trafo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-transformer',
        HC_PLUGIN_URL . 'modules/ideal-trafo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-transformer">
        <h3>İdeal Trafo Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Primer Gerilim (Vp, Volt)</label>
            <input type="number" id="hc-tr-vp" placeholder="V" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sekonder Gerilim (Vs, Volt)</label>
            <input type="number" id="hc-tr-vs" placeholder="V" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Primer Sarım Sayısı (Np)</label>
            <input type="number" id="hc-tr-np" placeholder="Sarım" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcTransformerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tr-result">
            <div style="padding: 5px 0;">
                <span>Sekonder Sarım (Ns):</span>
                <strong id="hc-tr-res-ns" style="float:right;">0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Dönüştürme Oranı (a):</span>
                <strong id="hc-tr-res-ratio" style="float:right;">0</strong>
            </div>
        </div>
    </div>
    <?php
}
