<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisi_kisisel_yil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-personal-year',
        HC_PLUGIN_URL . 'modules/cin-astrolojisi-kisisel-yil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-personal-calc">
        <h3>Çin Astrolojisi Kişisel Yıl</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-cpy-year" placeholder="Örn: 1980" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinKisiselYilHesapla()">Yıllık Analizi Gör</button>
        <div class="hc-result" id="hc-cin-astrolojisi-kisisel-yil-result">
            <div class="hc-result-header">2026 Yılı Analizi</div>
            <div id="hc-cpy-content" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
