<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gecikme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gecikme',
        HC_PLUGIN_URL . 'modules/gecikme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gecikme">
        <h3>Ağ Gecikmesi (Latency) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Mesafe (km)</label>
            <input type="number" id="hc-ge-dist" placeholder="Örn: 1000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sinyal Yayılma Hızı (km/sn)</label>
            <input type="number" id="hc-ge-speed" value="200000" step="1000">
            <small>Fiber kablo için yaklaşık 200.000 km/sn'dir.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Ek Donanım Gecikmesi (ms)</label>
            <input type="number" id="hc-ge-extra" value="5" step="0.1">
            <small>Router, switch vb. kaynaklı sabit gecikme.</small>
        </div>
        
        <button class="hc-btn" onclick="hcGecikmeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ge-result">
            <span>Tahmini Gecikme:</span>
            <div class="hc-result-value" id="hc-ge-res-ms">0 ms</div>
            <div id="hc-ge-res-rtt" style="margin-top:5px; font-size:0.9em; opacity:0.8;">RTT (Gidiş-Dönüş): 0 ms</div>
        </div>
    </div>
    <?php
}
