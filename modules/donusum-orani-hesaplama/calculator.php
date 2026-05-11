<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donusum_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-conv-rate',
        HC_PLUGIN_URL . 'modules/donusum-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-conv-rate">
        <h3>Dönüşüm Oranı (Conversion Rate) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Ziyaretçi / Tıklama Sayısı</label>
            <input type="number" id="hc-cr-visits" placeholder="Örn: 10000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Dönüşüm Sayısı (Satış, Kayıt vb.)</label>
            <input type="number" id="hc-cr-conv" placeholder="Örn: 250" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcConvRateHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cr-result">
            <span>Dönüşüm Oranı:</span>
            <div class="hc-result-value" id="hc-cr-res-val">%0</div>
            <div id="hc-cr-res-info" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Her 100 kişiden 0 kişi dönüştü.</div>
        </div>
    </div>
    <?php
}
