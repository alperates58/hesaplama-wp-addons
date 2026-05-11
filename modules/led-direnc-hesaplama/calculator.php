<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_led_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-led-res',
        HC_PLUGIN_URL . 'modules/led-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-led-res">
        <h3>LED Serisi Direnç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Besleme Gerilimi (Vs, Volt)</label>
            <input type="number" id="hc-lr-vs" placeholder="V" step="0.1" value="12">
        </div>
        
        <div class="hc-form-group">
            <label>LED İleri Gerilimi (Vf, Volt)</label>
            <input type="number" id="hc-lr-vf" placeholder="V" step="0.1" value="2.0">
            <small>Kırmızı: 1.8-2.0V, Mavi/Beyaz: 3.0-3.3V</small>
        </div>
        
        <div class="hc-form-group">
            <label>LED Akımı (If, mA)</label>
            <input type="number" id="hc-lr-if" placeholder="mA" step="1" value="20">
        </div>
        
        <button class="hc-btn" onclick="hcLedResHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lr-result">
            <div style="padding: 5px 0;">
                <span>Gereken Direnç (R):</span>
                <strong id="hc-lr-res-val" style="float:right;">0 Ω</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Direnç Gücü (P):</span>
                <strong id="hc-lr-res-p" style="float:right;">0 Watt</strong>
            </div>
        </div>
    </div>
    <?php
}
