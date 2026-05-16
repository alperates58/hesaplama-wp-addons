<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisine_gore_sansli_renk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-lucky-color',
        HC_PLUGIN_URL . 'modules/cin-astrolojisine-gore-sansli-renk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-lucky-color-css',
        HC_PLUGIN_URL . 'modules/cin-astrolojisine-gore-sansli-renk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-lucky-color">
        <h3>Çin Astrolojisi Şanslı Renkler</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-clcr-year" placeholder="Örn: 1993" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinSansliRenkHesapla()">Şanslı Renklerimi Bul</button>
        <div class="hc-result" id="hc-cin-lucky-color-result">
            <div class="hc-result-header">Sizin Şanslı Renkleriniz</div>
            <div id="hc-clcr-colors" class="hc-color-container"></div>
            <div id="hc-clcr-content" class="hc-result-value"></div>
            <div id="hc-clcr-desc" style="margin-top: 15px;"></div>
        </div>
    </div>
    <?php
}
