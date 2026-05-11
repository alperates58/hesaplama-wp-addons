<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaynak_dikisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weld',
        HC_PLUGIN_URL . 'modules/kaynak-dikisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-weld">
        <h3>Kaynak Dikişi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (P, Newton)</label>
            <input type="number" id="hc-wd-p" placeholder="N" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Dikiş Kalınlığı (a, mm)</label>
            <input type="number" id="hc-wd-a" placeholder="mm" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Dikiş Toplam Uzunluğu (L, mm)</label>
            <input type="number" id="hc-wd-l" placeholder="mm" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcWeldHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-wd-result">
            <span>Hesaplanan Kayma Gerilmesi (τ):</span>
            <div class="hc-result-value" id="hc-wd-res-val">0 MPa</div>
            <div id="hc-wd-res-status" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
