<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karisim_havasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-air-mix',
        HC_PLUGIN_URL . 'modules/karisim-havasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-air-mix">
        <h3>Hava Karışım Debisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>1. Hava Akışı (Q1, m³/h)</label>
            <input type="number" id="hc-am-q1" placeholder="m³/h" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>2. Hava Akışı (Q2, m³/h)</label>
            <input type="number" id="hc-am-q2" placeholder="m³/h" step="10">
        </div>
        
        <button class="hc-btn" onclick="hcAirMixHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-am-result">
            <div style="padding: 5px 0;">
                <span>Toplam Karışım Debisi (Qtot):</span>
                <strong id="hc-am-res-val" style="float:right;">0 m³/h</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>1. Hava Oranı:</span>
                <strong id="hc-am-res-p1" style="float:right;">%0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>2. Hava Oranı:</span>
                <strong id="hc-am-res-p2" style="float:right;">%0</strong>
            </div>
        </div>
    </div>
    <?php
}
