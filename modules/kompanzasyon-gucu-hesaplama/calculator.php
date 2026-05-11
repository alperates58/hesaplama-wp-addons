<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompanzasyon_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-comp-calc',
        HC_PLUGIN_URL . 'modules/kompanzasyon-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-comp-calc">
        <h3>Kompanzasyon Gücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Aktif Güç (P, kW)</label>
            <input type="number" id="hc-kg-p" placeholder="kW" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Mevcut Güç Faktörü (cos φ1)</label>
            <input type="number" id="hc-kg-cos1" placeholder="Örn: 0.75" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Hedef Güç Faktörü (cos φ2)</label>
            <input type="number" id="hc-kg-cos2" placeholder="Örn: 0.98" step="0.01" value="0.97">
        </div>
        
        <button class="hc-btn" onclick="hcCompHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kg-result">
            <span>Gereken Kondansatör Gücü (Qc):</span>
            <div class="hc-result-value" id="hc-kg-res-val">0 kVAr</div>
            <small>Formül: Qc = P × (tan φ1 - tan φ2)</small>
        </div>
    </div>
    <?php
}
