<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-debisi',
        HC_PLUGIN_URL . 'modules/boru-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-boru-debisi">
        <h3>Boru Debisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Boru İç Çapı (D, mm)</label>
            <input type="number" id="hc-bd-cap" placeholder="Örn: 50" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Akış Hızı (v, m/s)</label>
            <input type="number" id="hc-bd-hiz" placeholder="Örn: 1.5" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBoruDebisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bd-result">
            <span>Hesaplanan Debi:</span>
            <div class="hc-result-value" id="hc-bd-res-m3h">0 m³/saat</div>
            <div id="hc-bd-res-ls" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 L/sn</div>
        </div>
    </div>
    <?php
}
