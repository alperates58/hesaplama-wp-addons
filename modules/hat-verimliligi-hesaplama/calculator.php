<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hat_verimliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-line-eff',
        HC_PLUGIN_URL . 'modules/hat-verimliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-line-eff">
        <h3>Hat Verimliliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Üretilen Toplam Miktar (Adet)</label>
            <input type="number" id="hc-le-qty" placeholder="Örn: 500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Birim Standart Zaman (Dakika/Adet)</label>
            <input type="number" id="hc-le-std" placeholder="Örn: 2" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Fiili Çalışma Süresi (Dakika)</label>
            <input type="number" id="hc-le-time" placeholder="Örn: 480" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Hatta Çalışan İşçi Sayısı</label>
            <input type="number" id="hc-le-workers" placeholder="Örn: 5" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcLineEffHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-le-result">
            <span>Hat Verimlilik Oranı:</span>
            <div class="hc-result-value" id="hc-le-res-val">%0</div>
            <small>Formül: (Miktar × Std. Zaman) / (Süre × İşçi Sayısı)</small>
        </div>
    </div>
    <?php
}
