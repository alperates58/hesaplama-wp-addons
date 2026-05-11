<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalp_pili_pil_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pacemaker-life',
        HC_PLUGIN_URL . 'modules/kalp-pili-pil-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pacemaker-life">
        <h3>Kalp Pili Pil Ömrü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (mAh)</label>
            <input type="number" id="hc-pl-cap" placeholder="Örn: 1200" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Ortalama Akım Tüketimi (μA - Mikroamper)</label>
            <input type="number" id="hc-pl-current" placeholder="Örn: 15" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcPacemakerLifeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pl-result">
            <span>Tahmini Pil Ömrü:</span>
            <div class="hc-result-value" id="hc-pl-res-val">0 Yıl</div>
            <small>Hesaplama: Kapasite / (Akım × 8.76)</small>
        </div>
    </div>
    <?php
}
