<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_sansli_renk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lucky-color-date',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-sansli-renk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lucky-color-date-calc">
        <h3>Tarihe Göre Şanslı Renk</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-lcd-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSansliRenkTarihHesapla()">Rengimi Bul</button>
        <div class="hc-result" id="hc-dogum-tarihine-gore-sansli-renk-result">
            <div class="hc-result-header">Uğurlu Renginiz: <span id="hc-lcd-value" class="hc-result-value"></span></div>
            <div id="hc-lcd-box" style="width: 100%; height: 50px; border-radius: 5px; margin: 15px 0; border: 1px solid #ddd;"></div>
            <div id="hc-lcd-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
