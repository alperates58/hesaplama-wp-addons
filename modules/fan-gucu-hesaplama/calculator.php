<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fan_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fan-power',
        HC_PLUGIN_URL . 'modules/fan-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fan-power">
        <h3>Fan Gücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hava Debisi (Q, m³/h)</label>
            <input type="number" id="hc-fp-q" placeholder="m³/h" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Basınç Farkı (Δp, Pascal)</label>
            <input type="number" id="hc-fp-p" placeholder="Pa" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Fan Verimi (η, 0-1)</label>
            <input type="number" id="hc-fp-eta" placeholder="Örn: 0.65" step="0.01" value="0.65">
        </div>
        
        <button class="hc-btn" onclick="hcFanPowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fp-result">
            <span>Gereken Mil Gücü (P):</span>
            <div class="hc-result-value" id="hc-fp-res-val">0 Watt</div>
            <div id="hc-fp-res-kw" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kW</div>
        </div>
    </div>
    <?php
}
