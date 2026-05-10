<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalp_damar_hastaligi_riski_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalp-damar-hastaligi-riski-hesaplama',
        HC_PLUGIN_URL . 'modules/kalp-damar-hastaligi-riski-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalp-damar-hastaligi-riski-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kalp-damar-hastaligi-riski-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cvd-risk">
        <h3>Kalp Damar Hastalığı Risk Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-cv-age">Yaş</label>
            <input type="number" id="hc-cv-age" placeholder="Örn: 45">
        </div>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-cv-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-cv-smoke"> Sigara kullanıyor mu?</label>
            <label><input type="checkbox" id="hc-cv-dm"> Diyabet (Şeker Hastalığı) var mı?</label>
            <label><input type="checkbox" id="hc-cv-ht"> Yüksek Tansiyon tedavisi görüyor mu?</label>
        </div>
        <button class="hc-btn" onclick="hcCVDRiskiHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-cv-result">
            <div id="hc-cv-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
