<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_darbogaz_analizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bottleneck',
        HC_PLUGIN_URL . 'modules/darbogaz-analizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bottleneck">
        <h3>Darboğaz Analizi Hesaplama</h3>
        <p><small>Her bir istasyonun saatlik üretim kapasitesini girin.</small></p>
        
        <div id="hc-da-stations">
            <div class="hc-form-group">
                <label>İstasyon 1 Kapasitesi (Adet/saat)</label>
                <input type="number" class="hc-da-input" placeholder="İstasyon 1" step="1">
            </div>
            <div class="hc-form-group">
                <label>İstasyon 2 Kapasitesi (Adet/saat)</label>
                <input type="number" class="hc-da-input" placeholder="İstasyon 2" step="1">
            </div>
            <div class="hc-form-group">
                <label>İstasyon 3 Kapasitesi (Adet/saat)</label>
                <input type="number" class="hc-da-input" placeholder="İstasyon 3" step="1">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBottleneckHesapla()">Analiz Et</button>
        
        <div class="hc-result" id="hc-da-result">
            <span>Sistem Kapasitesi:</span>
            <div class="hc-result-value" id="hc-da-res-cap">0 Adet/saat</div>
            <div id="hc-da-res-info" style="margin-top:10px; font-weight:bold; color:#c0392b;">Darboğaz: İstasyon -</div>
            <small>Not: Toplam sistem kapasitesi, en yavaş istasyonun kapasitesine eşittir.</small>
        </div>
    </div>
    <?php
}
