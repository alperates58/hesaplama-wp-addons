<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaldirac_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lever',
        HC_PLUGIN_URL . 'modules/kaldirac-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lever">
        <h3>Kaldıraç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (F, N)</label>
            <input type="number" id="hc-lv-f" placeholder="N" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Yük (W, N)</label>
            <input type="number" id="hc-lv-w" placeholder="N" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kuvvet Kolu (L1, m)</label>
            <input type="number" id="hc-lv-l1" placeholder="m" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Kolu (L2, m)</label>
            <input type="number" id="hc-lv-l2" placeholder="m" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcLeverHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lv-result">
            <div style="padding: 5px 0;">
                <span>Mekanik Avantaj (MA):</span>
                <strong id="hc-lv-res-ma" style="float:right;">0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee; margin-top:5px;">
                <span>Durum:</span>
                <span id="hc-lv-res-desc" style="float:right; font-size:0.9em;">-</span>
            </div>
        </div>
    </div>
    <?php
}
