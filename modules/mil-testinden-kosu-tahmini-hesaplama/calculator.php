<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mil_testinden_kosu_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mile-test',
        HC_PLUGIN_URL . 'modules/mil-testinden-kosu-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mile-test-css',
        HC_PLUGIN_URL . 'modules/mil-testinden-kosu-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mile-test">
        <h3>Mil Testi (Rockport) VO₂ Max Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-mt-weight">Kilo (kg):</label>
            <input type="number" id="hc-mt-weight" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-mt-age">Yaş:</label>
            <input type="number" id="hc-mt-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-mt-gender">Cinsiyet:</label>
            <select id="hc-mt-gender">
                <option value="1">Erkek</option>
                <option value="0">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>1 Mil (1.6 km) Yürüyüş Süresi (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-mt-min" placeholder="15" style="flex:1;">
                <input type="number" id="hc-mt-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-mt-hr">Test Sonu Nabız:</label>
            <input type="number" id="hc-mt-hr" placeholder="120">
        </div>
        <button class="hc-btn" onclick="hcMileTestHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mile-test-result">
            <strong>Tahmini VO₂ Max:</strong>
            <div id="hc-mt-res-val" class="hc-result-value">-</div>
            <span>ml / kg / dk</span>
        </div>
    </div>
    <?php
}
