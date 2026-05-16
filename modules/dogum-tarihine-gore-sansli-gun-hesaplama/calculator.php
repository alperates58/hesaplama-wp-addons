<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_sansli_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lucky-day-date',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-sansli-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lucky-day-date-calc">
        <h3>Tarihe Göre Şanslı Gün</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-ldd-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSansliGunTarihHesapla()">Günümü Bul</button>
        <div class="hc-result" id="hc-dogum-tarihine-gore-sansli-gun-result">
            <div class="hc-result-header">Uğurlu Gününüz: <span id="hc-ldd-value" class="hc-result-value"></span></div>
            <div id="hc-ldd-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
