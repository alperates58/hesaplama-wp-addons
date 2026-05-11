<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cnc_kesim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cnc-time',
        HC_PLUGIN_URL . 'modules/cnc-kesim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cnc-time">
        <h3>CNC Kesim Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Kesim Yolu (L, mm)</label>
            <input type="number" id="hc-cnc-l" placeholder="Örn: 2500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>İlerleme Hızı (f, mm/dakika)</label>
            <input type="number" id="hc-cnc-f" placeholder="Örn: 500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Boşta Geçen/Hazırlık Süresi (Dakika)</label>
            <input type="number" id="hc-cnc-h" value="2" step="0.5">
        </div>
        
        <button class="hc-btn" onclick="hcCncSüreHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cnc-result">
            <span>Tahmini İşlem Süresi:</span>
            <div class="hc-result-value" id="hc-cnc-res-val">0 dk 0 sn</div>
            <div id="hc-cnc-res-dec" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Toplam: 0 dk</div>
        </div>
    </div>
    <?php
}
