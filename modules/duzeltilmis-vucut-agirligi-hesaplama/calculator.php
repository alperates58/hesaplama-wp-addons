<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duzeltilmis_vucut_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ajbw-calc',
        HC_PLUGIN_URL . 'modules/duzeltilmis-vucut-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ajbw-calc-css',
        HC_PLUGIN_URL . 'modules/duzeltilmis-vucut-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ajbw">
        <h3>Düzeltilmiş Vücut Ağırlığı (AjBW)</h3>
        <div class="hc-form-group">
            <label for="hc-ajbw-gender">Cinsiyet:</label>
            <select id="hc-ajbw-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ajbw-height">Boy (cm):</label>
            <input type="number" id="hc-ajbw-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-ajbw-actual">Mevcut Kilo (kg):</label>
            <input type="number" id="hc-ajbw-actual" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcAjbwHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ajbw-result">
            <strong>Düzeltilmiş Ağırlık: <span id="hc-ajbw-res-val" class="hc-result-value">-</span> kg</strong>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Özellikle vücut ağırlığının ideal ağırlıktan %20-30 fazla olduğu durumlarda tıbbi dozlama için kullanılır.</p>
        </div>
    </div>
    <?php
}
