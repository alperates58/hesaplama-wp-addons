<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aydinlatma_seviyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aydinlatma',
        HC_PLUGIN_URL . 'modules/aydinlatma-seviyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-aydinlatma">
        <h3>Aydınlatma Seviyesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Lamba Başına Işık Akısı (Lümen, lm)</label>
            <input type="number" id="hc-ayd-lumen" placeholder="Örn: 1500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Lamba Sayısı (Adet)</label>
            <input type="number" id="hc-ayd-adet" placeholder="Örn: 4" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Aydınlatılacak Alan (m²)</label>
            <input type="number" id="hc-ayd-alan" placeholder="Örn: 20" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kullanım Faktörü (UF, 0-1)</label>
            <input type="number" id="hc-ayd-uf" value="0.6" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Bakım Faktörü (MF, 0-1)</label>
            <input type="number" id="hc-ayd-mf" value="0.8" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcAydinlatmaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ayd-result">
            <span>Ortalama Aydınlık Düzeyi (E):</span>
            <div class="hc-result-value" id="hc-ayd-res-lux">0 Lux</div>
            <small>Not: 1 Lux = 1 Lümen / m²</small>
        </div>
    </div>
    <?php
}
