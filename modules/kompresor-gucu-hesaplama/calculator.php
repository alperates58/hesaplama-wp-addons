<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompresor_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-comp-power',
        HC_PLUGIN_URL . 'modules/kompresor-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-comp-power">
        <h3>Kompresör Gücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hava Debisi (Q, m³/dak)</label>
            <input type="number" id="hc-cp-q" placeholder="m³/dak" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Giriş Basıncı (P1, bar-abs)</label>
            <input type="number" id="hc-cp-p1" placeholder="bar" step="0.1" value="1.013">
        </div>
        
        <div class="hc-form-group">
            <label>Çıkış Basıncı (P2, bar-abs)</label>
            <input type="number" id="hc-cp-p2" placeholder="bar" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kompresör Verimi (η)</label>
            <input type="number" id="hc-cp-eta" placeholder="0.7-0.9" step="0.01" value="0.8">
        </div>
        
        <button class="hc-btn" onclick="hcCompPowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cp-result">
            <span>Gereken Motor Gücü (P):</span>
            <div class="hc-result-value" id="hc-cp-res-val">0 kW</div>
            <div id="hc-cp-res-hp" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 HP</div>
        </div>
    </div>
    <?php
}
