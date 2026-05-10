<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyuma_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyuma-saati',
        HC_PLUGIN_URL . 'modules/uyuma-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uyuma-saati-css',
        HC_PLUGIN_URL . 'modules/uyuma-saati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uyuma-saati">
        <h3>Uyuma Saati Hesaplama</h3>
        <p>Sabah kaçta uyanmak istiyorsunuz?</p>
        <div class="hc-form-group">
            <label for="hc-uy-wake">Uyanış Saati:</label>
            <input type="time" id="hc-uy-wake" value="07:00">
        </div>
        <button class="hc-btn" onclick="hcUyumaSaatiHesapla()">Yatış Saatlerini Bul</button>
        <div class="hc-result" id="hc-uyuma-saati-result">
            <div id="hc-uy-res-list" class="hc-uy-list"></div>
        </div>
    </div>
    <?php
}
