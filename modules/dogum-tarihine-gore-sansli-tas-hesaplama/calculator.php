<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_sansli_tas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lucky-stone-date',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-sansli-tas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lucky-stone-date-calc">
        <h3>Tarihe Göre Şanslı Taş</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-lsd-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSansliTasTarihHesapla()">Şanslı Taşımı Bul</button>
        <div class="hc-result" id="hc-dogum-tarihine-gore-sansli-tas-result">
            <div class="hc-result-header">Uğurlu Taşınız: <span id="hc-lsd-value" class="hc-result-value"></span></div>
            <div id="hc-lsd-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
