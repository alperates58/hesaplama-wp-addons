<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mach_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mach-calc',
        HC_PLUGIN_URL . 'modules/mach-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mach-calc">
        <h3>Mach Sayısı Hesaplama</h3>
        <p><small>M = Nesne Hızı (v) / Ses Hızı (a)</small></p>
        
        <div class="hc-form-group">
            <label>Nesne Hızı (v, m/s)</label>
            <input type="number" id="hc-mc-v" placeholder="m/s" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ortam Sıcaklığı (T, °C)</label>
            <input type="number" id="hc-mc-t" placeholder="°C" step="0.1" value="15">
        </div>
        
        <button class="hc-btn" onclick="hcMachHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mc-result">
            <span>Mach Sayısı (M):</span>
            <div class="hc-result-value" id="hc-mc-res-val">0</div>
            <div id="hc-mc-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
