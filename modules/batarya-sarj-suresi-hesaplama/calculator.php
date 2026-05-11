<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_batarya_sarj_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-batarya-sarj',
        HC_PLUGIN_URL . 'modules/batarya-sarj-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-batarya-sarj">
        <h3>Batarya Şarj Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (Ah - Amper Saat)</label>
            <input type="number" id="hc-bs-kapasite" placeholder="Örn: 100" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Şarj Akımı (Amper, A)</label>
            <input type="number" id="hc-bs-akim" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Şarj Verimliliği (%)</label>
            <input type="number" id="hc-bs-verim" value="85" step="1">
            <small>Kurşun-asit için ~85%, Lityum için ~95% önerilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcBataryaSarjHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bs-result">
            <span>Tahmini Şarj Süresi:</span>
            <div class="hc-result-value" id="hc-bs-res-saat">0 saat 0 dakika</div>
            <div id="hc-bs-res-decimal" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 saat</div>
        </div>
    </div>
    <?php
}
