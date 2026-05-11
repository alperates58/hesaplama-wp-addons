<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_capi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-capi',
        HC_PLUGIN_URL . 'modules/boru-capi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-boru-capi">
        <h3>Boru Çapı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Debi (Q, m³/saat)</label>
            <input type="number" id="hc-bc-debi" placeholder="Örn: 50" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Akış Hızı (v, m/s)</label>
            <input type="number" id="hc-bc-hiz" placeholder="Örn: 1.5" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBoruCapiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bc-result">
            <span>Gerekli Boru İç Çapı:</span>
            <div class="hc-result-value" id="hc-bc-res-mm">0 mm</div>
            <div id="hc-bc-res-m" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 m</div>
        </div>
    </div>
    <?php
}
