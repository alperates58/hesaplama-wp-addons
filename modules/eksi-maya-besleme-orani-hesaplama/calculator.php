<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eksi_maya_besleme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-starter-feed',
        HC_PLUGIN_URL . 'modules/eksi-maya-besleme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-starter-feed-css',
        HC_PLUGIN_URL . 'modules/eksi-maya-besleme-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-starter-feed">
        <h3>Ekşi Maya Besleme</h3>
        <div class="hc-form-group">
            <label for="hc-sf-starter">Mevcut Maya (gr)</label>
            <input type="number" id="hc-sf-starter" value="50" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sf-ratio">Besleme Oranı (1:X:X)</label>
            <input type="number" id="hc-sf-ratio" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcStarterFeedHesapla()">Ölçüleri Gör</button>
        <div class="hc-result" id="hc-starter-feed-result">
            <div class="hc-result-item"> <span>Eklenecek Un:</span> <b id="hc-res-sf-flour">0 gr</b> </div>
            <div class="hc-result-item"> <span>Eklenecek Su:</span> <b id="hc-res-sf-water">0 gr</b> </div>
            <div class="hc-result-item"> <span>Toplam Yeni Maya:</span> <b id="hc-res-sf-total">0 gr</b> </div>
        </div>
    </div>
    <?php
}
