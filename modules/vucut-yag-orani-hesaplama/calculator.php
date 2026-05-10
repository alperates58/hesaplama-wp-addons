<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yag_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fat-calc',
        HC_PLUGIN_URL . 'modules/vucut-yag-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fat-calc-css',
        HC_PLUGIN_URL . 'modules/vucut-yag-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fat-calc">
        <h3>Vücut Yağ Oranı Hesaplama (U.S. Navy)</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-fc-gender" value="male" checked onchange="hcFcToggleHip()"> Erkek</label>
                <label><input type="radio" name="hc-fc-gender" value="female" onchange="hcFcToggleHip()"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-height">Boy (cm):</label>
            <input type="number" id="hc-fc-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-neck">Boyun Çevresi (cm):</label>
            <input type="number" id="hc-fc-neck" placeholder="38">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-waist">Bel Çevresi (cm):</label>
            <input type="number" id="hc-fc-waist" placeholder="85">
        </div>
        <div class="hc-form-group" id="hc-fc-hip-group" style="display:none;">
            <label for="hc-fc-hip">Kalça Çevresi (cm):</label>
            <input type="number" id="hc-fc-hip" placeholder="95">
        </div>
        <button class="hc-btn" onclick="hcFatCalcHesapla()">Yağ Oranını Hesapla</button>
        <div class="hc-result" id="hc-fat-calc-result">
            <strong>Vücut Yağ Oranı: %<span id="hc-fc-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-fc-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
