<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruh_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ruh-num',
        HC_PLUGIN_URL . 'modules/ruh-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ruh-num-css',
        HC_PLUGIN_URL . 'modules/ruh-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ruh-sayisi-hesaplama">
        <h3>Ruh Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ruh-name">Tam Adınız</label>
            <input type="text" id="hc-ruh-name" placeholder="Adınız ve Soyadınız">
        </div>
        <button class="hc-btn" onclick="hcRuhHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ruh-result">
            <div class="hc-result-label">Ruh Sayınız:</div>
            <div class="hc-result-value" id="hc-ruh-val"></div>
            <div class="hc-result-desc" id="hc-ruh-desc"></div>
        </div>
    </div>
    <?php
}
