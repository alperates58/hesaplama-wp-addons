<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_direnc_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-resistor-power',
        HC_PLUGIN_URL . 'modules/direnc-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-resistor-power">
        <h3>Direnç Gücü Hesaplama</h3>
        <p><small>Lütfen en az iki değeri doldurun.</small></p>
        
        <div class="hc-form-group">
            <label>Gerilim (V, Volt)</label>
            <input type="number" id="hc-rg-v" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Akım (I, Amper)</label>
            <input type="number" id="hc-rg-i" placeholder="I" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Direnç (R, Ohm)</label>
            <input type="number" id="hc-rg-r" placeholder="Ω" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcResistorPowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rg-result">
            <span>Harcanan Güç (P):</span>
            <div class="hc-result-value" id="hc-rg-res-w">0 Watt</div>
            <div id="hc-rg-res-mw" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 mW</div>
        </div>
    </div>
    <?php
}
