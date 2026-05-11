<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapasite_kullanim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-capacity-util',
        HC_PLUGIN_URL . 'modules/kapasite-kullanim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-capacity-util">
        <h3>Kapasite Kullanım Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Fiili Üretim / Çıktı (Adet, kg vb.)</label>
            <input type="number" id="hc-kko-actual" placeholder="Örn: 8000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Maksimum (Teorik) Kapasite</label>
            <input type="number" id="hc-kko-max" placeholder="Örn: 10000" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcCapacityUtilHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kko-result">
            <span>Kapasite Kullanım Oranı (KKO):</span>
            <div class="hc-result-value" id="hc-kko-res-val">%0</div>
            <div id="hc-kko-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Atıl Kapasite: %0</div>
        </div>
    </div>
    <?php
}
