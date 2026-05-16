<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_element_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-element-uyum',
        HC_PLUGIN_URL . 'modules/cin-burcu-element-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-element-uyum-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-element-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-element-uyum">
        <h3>Çin Burcu Element Uyumu</h3>
        <div class="hc-form-group">
            <label>1. Kişinin Doğum Yılı</label>
            <input type="number" id="hc-ceu-year1" placeholder="Örn: 1990" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label>2. Kişinin Doğum Yılı</label>
            <input type="number" id="hc-ceu-year2" placeholder="Örn: 1992" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinElementUyumuHesapla()">Uyumu Hesapla</button>
        <div class="hc-result" id="hc-cin-element-uyum-result">
            <div class="hc-result-header">Uyum Sonucu</div>
            <div id="hc-ceu-content"></div>
        </div>
    </div>
    <?php
}
