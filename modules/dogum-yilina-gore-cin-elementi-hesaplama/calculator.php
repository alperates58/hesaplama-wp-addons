<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_yilina_gore_cin_elementi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-element-by-year',
        HC_PLUGIN_URL . 'modules/dogum-yilina-gore-cin-elementi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-element-year">
        <h3>Çin Elementi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-cey-year" placeholder="Örn: 1985" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcDogumYiliElementHesapla()">Elementimi Bul</button>
        <div class="hc-result" id="hc-dogum-yilina-gore-cin-elementi-result">
            <div class="hc-result-header">Elementiniz: <span id="hc-cey-name" class="hc-result-value"></span></div>
            <div id="hc-cey-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
