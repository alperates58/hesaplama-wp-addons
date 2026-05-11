<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kayis_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-belt-len',
        HC_PLUGIN_URL . 'modules/kayis-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-belt-len">
        <h3>Kayış Uzunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Büyük Kasnak Çapı (D, mm)</label>
            <input type="number" id="hc-bl-d" placeholder="mm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Küçük Kasnak Çapı (d, mm)</label>
            <input type="number" id="hc-bl-sd" placeholder="mm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Merkez Mesafesi (C, mm)</label>
            <input type="number" id="hc-bl-c" placeholder="mm" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcBeltLenHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bl-result">
            <span>Hesaplanan Kayış Uzunluğu (L):</span>
            <div class="hc-result-value" id="hc-bl-res-val">0 mm</div>
            <div id="hc-bl-res-mt" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 metre</div>
        </div>
    </div>
    <?php
}
