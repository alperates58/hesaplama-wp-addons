<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fren_balatasi_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-balata-calc',
        HC_PLUGIN_URL . 'modules/fren-balatasi-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fbo-box">
        <h3>Fren Balatası Ömrü Hesaplama</h3>
        <div class="hc-form-group">
            <label>Balata Tipi</label>
            <select id="hc-fbo-type">
                <option value="40000">Yarı Metalik (Standart)</option>
                <option value="60000">Seramik (Performans/Uzun Ömürlü)</option>
                <option value="30000">Organik (Yumuşak)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Sürüş Tarzı</label>
            <select id="hc-fbo-style">
                <option value="1.0">Normal</option>
                <option value="0.6">Agresif (Sert frenleme)</option>
                <option value="1.2">Sakin (Motor freni kullanan)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Yol Topoğrafyası</label>
            <select id="hc-fbo-road">
                <option value="1.0">Düz Yol / Şehirlerarası</option>
                <option value="0.7">Şehir İçi (Dur-Kalk)</option>
                <option value="0.5">Dağlık / Yokuşlu</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFboHesapla()">Ömrü Hesapla</button>
        <div class="hc-result" id="hc-fbo-result">
            <div class="hc-result-title">Tahmini Balata Ömrü:</div>
            <div class="hc-result-value" id="hc-fbo-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Fren sesleri gelmeye başladığında veya fren mesafesi uzadığında kontrol ettiriniz.</p>
        </div>
    </div>
    <?php
}
