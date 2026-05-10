<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_apnesi_risk_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stop-bang',
        HC_PLUGIN_URL . 'modules/uyku-apnesi-risk-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stop-bang-css',
        HC_PLUGIN_URL . 'modules/uyku-apnesi-risk-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stop-bang">
        <h3>STOP-BANG Uyku Apnesi Risk Testi</h3>
        <p>Aşağıdaki sorulara "Evet" veya "Hayır" cevabı verin:</p>
        
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-s"> <strong>Snoring (Horlama):</strong> Yüksek sesle horluyor musunuz?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-t"> <strong>Tired (Yorgunluk):</strong> Gün boyu yorgun ve uykulu hissediyor musunuz?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-o"> <strong>Observed (Gözlem):</strong> Uykuda nefesinizin durduğu gözlendi mi?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-p"> <strong>Pressure (Tansiyon):</strong> Yüksek tansiyonunuz var mı?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-b"> <strong>BMI:</strong> VKİ değeriniz 35'ten yüksek mi?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-a"> <strong>Age (Yaş):</strong> 50 yaşından büyük müsünüz?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-n"> <strong>Neck (Boyun):</strong> Boyun çevreniz 40 cm'den geniş mi?</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-sb-g"> <strong>Gender (Cinsiyet):</strong> Erkek misiniz?</label>
        </div>

        <button class="hc-btn" onclick="hcStopBangHesapla()">Risk Seviyesini Gör</button>
        <div class="hc-result" id="hc-stop-bang-result">
            <strong>Toplam Puan: <span id="hc-sb-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-sb-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
