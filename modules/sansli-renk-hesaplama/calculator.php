<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sansli_renk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lucky-color-name',
        HC_PLUGIN_URL . 'modules/sansli-renk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lucky-color-name-css',
        HC_PLUGIN_URL . 'modules/sansli-renk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lucky-color-calc">
        <h3>İsme Göre Şanslı Renk</h3>
        <div class="hc-form-group">
            <label>Tam Adınız</label>
            <input type="text" id="hc-lcn-name" placeholder="Adınız ve Soyadınız" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSansliRenkIsimHesapla()">Rengimi Bul</button>
        <div class="hc-result" id="hc-sansli-renk-result">
            <div class="hc-result-header">Sizin Şanslı Renginiz: <span id="hc-lcn-value" class="hc-result-value"></span></div>
            <div id="hc-lcn-box" style="width: 100%; height: 50px; border-radius: 5px; margin: 15px 0; border: 1px solid #ddd;"></div>
            <div id="hc-lcn-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
