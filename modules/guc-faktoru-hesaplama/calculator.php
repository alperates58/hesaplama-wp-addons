<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pf-calc',
        HC_PLUGIN_URL . 'modules/guc-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pf-calc">
        <h3>Güç Faktörü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Aktif Güç (P, kW)</label>
            <input type="number" id="hc-pf-p" placeholder="kW" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Reaktif Güç (Q, kVAr)</label>
            <input type="number" id="hc-pf-q" placeholder="kVAr" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcPowerFactorHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pf-result">
            <div style="padding: 5px 0;">
                <span>Güç Faktörü (cos φ):</span>
                <strong id="hc-pf-res-pf" style="float:right;">0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Görünür Güç (S):</span>
                <strong id="hc-pf-res-s" style="float:right;">0 kVA</strong>
            </div>
            <div id="hc-pf-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
