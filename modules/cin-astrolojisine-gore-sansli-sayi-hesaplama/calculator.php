<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisine_gore_sansli_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-lucky-num',
        HC_PLUGIN_URL . 'modules/cin-astrolojisine-gore-sansli-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-lucky-num">
        <h3>Çin Astrolojisi Şanslı Sayılar</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-cln-year" placeholder="Örn: 1995" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinSansliSayiHesapla()">Şanslı Sayılarımı Bul</button>
        <div class="hc-result" id="hc-cin-lucky-num-result">
            <div class="hc-result-header">Şanslı Sayılarınız</div>
            <div id="hc-cln-content" class="hc-result-value"></div>
            <div id="hc-cln-desc" style="margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
