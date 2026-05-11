<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bakir_tel_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bakir-tel',
        HC_PLUGIN_URL . 'modules/bakir-tel-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bakir-tel">
        <h3>Bakır Tel Ağırlığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Tel Çapı (d, mm)</label>
            <input type="number" id="hc-bt-cap" placeholder="Örn: 1.5" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Tel Uzunluğu (L, metre)</label>
            <input type="number" id="hc-bt-uzunluk" placeholder="Örn: 100" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBakirTelHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bt-result">
            <span>Toplam Bakır Ağırlığı:</span>
            <div class="hc-result-value" id="hc-bt-res-kg">0 kg</div>
            <div id="hc-bt-res-g" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 g</div>
        </div>
    </div>
    <?php
}
