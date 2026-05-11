<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaldirac_denge_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lever-balance',
        HC_PLUGIN_URL . 'modules/kaldirac-denge-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lever-balance">
        <h3>Kaldıraç Denge Noktası Hesaplama</h3>
        <p><small>Bilinmeyen değeri boş bırakın.</small></p>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (F1, N)</label>
            <input type="number" id="hc-lb-f1" placeholder="N" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kuvvet Kolu (d1, metre)</label>
            <input type="number" id="hc-lb-d1" placeholder="m" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Yük / Direnç Kuvveti (F2, N)</label>
            <input type="number" id="hc-lb-f2" placeholder="N" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Kolu (d2, metre)</label>
            <input type="number" id="hc-lb-d2" placeholder="m" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcLeverBalanceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lb-result">
            <span>Hesaplanan Değer:</span>
            <div class="hc-result-value" id="hc-lb-res-val">-</div>
            <small>Prensip: F1 × d1 = F2 × d2</small>
        </div>
    </div>
    <?php
}
