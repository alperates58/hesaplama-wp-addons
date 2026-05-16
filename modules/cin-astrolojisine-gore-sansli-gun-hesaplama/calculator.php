<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisine_gore_sansli_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-lucky-day',
        HC_PLUGIN_URL . 'modules/cin-astrolojisine-gore-sansli-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-lucky-day">
        <h3>Çin Astrolojisi Şanslı Günler</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-clgy-year" placeholder="Örn: 1988" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinSansliGunHesapla()">Şanslı Günlerimi Bul</button>
        <div class="hc-result" id="hc-cin-lucky-day-result">
            <div class="hc-result-header">Her Ayın Şanslı Günleri</div>
            <div id="hc-clgy-content" class="hc-result-value"></div>
            <div id="hc-clgy-desc" style="margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
