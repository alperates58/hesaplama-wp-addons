<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deri_kivrimiyla_yag_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-skinfold',
        HC_PLUGIN_URL . 'modules/deri-kivrimiyla-yag-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-skinfold-css',
        HC_PLUGIN_URL . 'modules/deri-kivrimiyla-yag-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-skinfold">
        <h3>Jackson-Pollock 3 Noktalı Yağ Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <select id="hc-sf-gender" onchange="hcSfToggleFields()">
                <option value="male">Erkek (Göğüs, Karın, Uyluk)</option>
                <option value="female">Kadın (Triceps, Suprailiac, Uyluk)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sf-age">Yaş:</label>
            <input type="number" id="hc-sf-age" placeholder="30">
        </div>
        
        <div id="hc-sf-m-fields">
            <div class="hc-form-group">
                <label for="hc-sf-chest">Göğüs Kıvrımı (mm):</label>
                <input type="number" id="hc-sf-chest" step="0.1">
            </div>
            <div class="hc-form-group">
                <label for="hc-sf-abd">Karın Kıvrımı (mm):</label>
                <input type="number" id="hc-sf-abd" step="0.1">
            </div>
        </div>

        <div id="hc-sf-f-fields" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-sf-tri">Triceps Kıvrımı (mm):</label>
                <input type="number" id="hc-sf-tri" step="0.1">
            </div>
            <div class="hc-form-group">
                <label for="hc-sf-supra">Suprailiac Kıvrımı (mm):</label>
                <input type="number" id="hc-sf-supra" step="0.1">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-sf-thigh">Uyluk Kıvrımı (mm):</label>
            <input type="number" id="hc-sf-thigh" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcSkinfoldHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-skinfold-result">
            <strong>Tahmini Yağ Oranı: %<span id="hc-sf-res-val" class="hc-result-value">-</span></strong>
        </div>
    </div>
    <?php
}
