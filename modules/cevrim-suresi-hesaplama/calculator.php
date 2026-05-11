<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cevrim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cycle-time',
        HC_PLUGIN_URL . 'modules/cevrim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cycle-time">
        <h3>Çevrim Süresi (Cycle Time) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Çalışma Süresi (Dakika)</label>
            <input type="number" id="hc-cs-sure" placeholder="Örn: 480" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Toplam Üretilen Miktar (Adet)</label>
            <input type="number" id="hc-cs-miktar" placeholder="Örn: 100" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcCycleTimeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cs-result">
            <span>Birim Başına Çevrim Süresi:</span>
            <div class="hc-result-value" id="hc-cs-res-val">0 dk/adet</div>
            <div id="hc-cs-res-sec" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Birim başına: 0 saniye</div>
        </div>
    </div>
    <?php
}
