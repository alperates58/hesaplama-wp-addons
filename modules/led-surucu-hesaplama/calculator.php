<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_led_surucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-led-driver',
        HC_PLUGIN_URL . 'modules/led-surucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-led-driver">
        <h3>LED Sürücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Tek LED İleri Gerilimi (Vf, Volt)</label>
            <input type="number" id="hc-ls-vf" placeholder="V" step="0.1" value="3.2">
        </div>
        
        <div class="hc-form-group">
            <label>LED Akımı (If, mA)</label>
            <input type="number" id="hc-ls-if" placeholder="mA" step="1" value="350">
        </div>
        
        <div class="hc-form-group">
            <label>Seri Bağlı LED Sayısı</label>
            <input type="number" id="hc-ls-count" placeholder="Adet" step="1" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcLedDriverHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ls-result">
            <div style="padding: 5px 0;">
                <span>Sürücü Çıkış Gerilimi:</span>
                <strong id="hc-ls-res-v" style="float:right;">0 V</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Sürücü Akımı:</span>
                <strong id="hc-ls-res-i" style="float:right;">0 mA</strong>
            </div>
            <div style="padding: 10px 0; border-top: 2px solid #eee; margin-top:5px;">
                <span>Minimum Sürücü Gücü:</span>
                <div class="hc-result-value" id="hc-ls-res-p" style="color:#27ae60;">0 Watt</div>
            </div>
        </div>
    </div>
    <?php
}
