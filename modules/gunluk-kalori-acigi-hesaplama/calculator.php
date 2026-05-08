<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_kalori_acigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-kal-acik',
        HC_PLUGIN_URL . 'modules/gunluk-kalori-acigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gunluk-kalori-acigi-hesaplama">
        <h3>Günlük Kalori Açığı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Günlük Yakılan Kalori (TDEE)</label>
            <input type="number" id="hc-gka-burned" placeholder="Örn: 2500">
        </div>
        <div class="hc-form-group">
            <label>Günlük Alınan Kalori</label>
            <input type="number" id="hc-gka-taken" placeholder="Örn: 2000">
        </div>
        <button class="hc-btn" onclick="hcGkaHesapla()">Açığı Hesapla</button>
        <div class="hc-result" id="hc-gka-result">
            <div class="hc-result-value" id="hc-gka-val">-</div>
            <p id="hc-gka-yorum"></p>
        </div>
    </div>
    <?php
}
