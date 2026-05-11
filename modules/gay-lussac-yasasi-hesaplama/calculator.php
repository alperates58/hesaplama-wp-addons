<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gay_lussac_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gay-lussac',
        HC_PLUGIN_URL . 'modules/gay-lussac-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gay-lussac">
        <h3>Gay-Lussac Yasası Hesaplama</h3>
        <p><small>Bilinmeyen değeri boş bırakın (P1, T1, P2 veya T2).</small></p>
        
        <div class="hc-form-group">
            <label>Başlangıç Basıncı (P1, bar)</label>
            <input type="number" id="hc-gl-p1" placeholder="bar" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Başlangıç Sıcaklığı (T1, °C)</label>
            <input type="number" id="hc-gl-t1" placeholder="°C" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Son Basınç (P2, bar)</label>
            <input type="number" id="hc-gl-p2" placeholder="bar" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Son Sıcaklık (T2, °C)</label>
            <input type="number" id="hc-gl-t2" placeholder="°C" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcGayLussacHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gl-result">
            <span>Hesaplanan Değer:</span>
            <div class="hc-result-value" id="hc-gl-res-val">-</div>
            <small>Not: Sıcaklık hesaplamada Kelvin'e çevrilir.</small>
        </div>
    </div>
    <?php
}
