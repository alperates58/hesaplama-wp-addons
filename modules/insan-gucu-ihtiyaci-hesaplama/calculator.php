<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_insan_gucu_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-manpower',
        HC_PLUGIN_URL . 'modules/insan-gucu-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-manpower">
        <h3>İnsan Gücü İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Üretim Hedefi (Adet)</label>
            <input type="number" id="hc-mp-qty" placeholder="Örn: 1000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Birim Standart Zaman (Dakika/Adet)</label>
            <input type="number" id="hc-mp-std" placeholder="Örn: 5" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Vardiya Süresi (Dakika)</label>
            <input type="number" id="hc-mp-time" placeholder="Örn: 480" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Beklenen Verimlilik (%)</label>
            <input type="number" id="hc-mp-eff" placeholder="Örn: 85" step="1" value="100">
        </div>
        
        <button class="hc-btn" onclick="hcManpowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mp-result">
            <span>Gerekli Personel Sayısı:</span>
            <div class="hc-result-value" id="hc-mp-res-val">0 Kişi</div>
            <small>Not: Sonuç yukarı yuvarlanmıştır.</small>
        </div>
    </div>
    <?php
}
