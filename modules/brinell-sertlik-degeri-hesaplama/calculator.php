<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_brinell_sertlik_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brinell',
        HC_PLUGIN_URL . 'modules/brinell-sertlik-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-brinell">
        <h3>Brinell Sertlik Değeri (HBW) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Uygulanan Yük (F, kgf)</label>
            <input type="number" id="hc-bri-f" placeholder="Örn: 3000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Bilye Çapı (D, mm)</label>
            <input type="number" id="hc-bri-D" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>İz Çapı (d, mm)</label>
            <input type="number" id="hc-bri-d" placeholder="Örn: 4.5" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcBrinellHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bri-result">
            <span>Brinell Sertliği:</span>
            <div class="hc-result-value" id="hc-bri-res-hbw">0 HBW</div>
        </div>
    </div>
    <?php
}
