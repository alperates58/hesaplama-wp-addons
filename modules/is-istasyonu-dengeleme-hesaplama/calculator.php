<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_istasyonu_dengeleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-line-balancing',
        HC_PLUGIN_URL . 'modules/is-istasyonu-dengeleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-line-balancing">
        <h3>İş İstasyonu Dengeleme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Günlük Kullanılabilir Süre (Dakika)</label>
            <input type="number" id="hc-lb-time" placeholder="Örn: 480" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Günlük Talep Miktarı (Adet)</label>
            <input type="number" id="hc-lb-demand" placeholder="Örn: 240" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Görev Süreleri Toplamı (Dakika)</label>
            <input type="number" id="hc-lb-task-sum" placeholder="Örn: 10" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcLineBalancingHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lb-result">
            <div style="padding: 5px 0;">
                <span>Gerekli Çevrim Süresi (C):</span>
                <strong id="hc-lb-res-cycle" style="float:right;">0 dk/adet</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Min. Teorik İstasyon Sayısı (N):</span>
                <strong id="hc-lb-res-stations" style="float:right;">0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee; margin-top:5px;">
                <span>Verimlilik (Tahmini):</span>
                <strong id="hc-lb-res-eff" style="float:right;">%0</strong>
            </div>
        </div>
    </div>
    <?php
}
