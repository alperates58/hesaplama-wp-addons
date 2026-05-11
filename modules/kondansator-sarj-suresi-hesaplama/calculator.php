<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kondansator_sarj_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cap-time',
        HC_PLUGIN_URL . 'modules/kondansator-sarj-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cap-time">
        <h3>RC Şarj Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Direnç (R, Ohm)</label>
            <input type="number" id="hc-ctt-r" placeholder="Ω" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kapasite (C, μF)</label>
            <input type="number" id="hc-ctt-c" placeholder="μF" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kaynak Gerilimi (Vin, Volt)</label>
            <input type="number" id="hc-ctt-vin" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Hedef Gerilim (Vc, Volt)</label>
            <input type="number" id="hc-ctt-vc" placeholder="V" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCapTimeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ctt-result">
            <span>Hesaplanan Süre (t):</span>
            <div class="hc-result-value" id="hc-ctt-res-val">0 Saniye</div>
            <div id="hc-ctt-res-tau" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Zaman Sabiti (τ): 0 ms</div>
        </div>
    </div>
    <?php
}
