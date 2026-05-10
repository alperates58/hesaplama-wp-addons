<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vegan_beslenme_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vegan-beslenme-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/vegan-beslenme-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vegan-beslenme-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/vegan-beslenme-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vegan-impact">
        <h3>Vegan Beslenme Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-vb-duration">Süre (Gün)</label>
            <input type="number" id="hc-vb-duration" value="30">
        </div>
        <button class="hc-btn" onclick="hcVeganBeslenmeKarbonAyakİziHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-vb-result">
            <div id="hc-vb-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
