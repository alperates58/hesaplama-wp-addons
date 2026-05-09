<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cay_demleme_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tea-measure',
        HC_PLUGIN_URL . 'modules/cay-demleme-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tea-measure-css',
        HC_PLUGIN_URL . 'modules/cay-demleme-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tea-measure">
        <h3>Çay Demleme Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-tm-people">Kişi Sayısı</label>
            <input type="number" id="hc-tm-people" value="4" min="1">
        </div>
        <button class="hc-btn" onclick="hcTeaMeasureHesapla()">Ölçüleri Gör</button>
        <div class="hc-result" id="hc-tea-measure-result">
            <div class="hc-result-item">
                <span>Kuru Çay:</span>
                <span id="hc-res-tm-tea">0 Yemek Kaşığı</span>
            </div>
            <div class="hc-result-item">
                <span>Demlik Suyu:</span>
                <span id="hc-res-tm-water">0 Bardak</span>
            </div>
            <p class="hc-tm-note">Not: Bir yemek kaşığı yaklaşık 5 gr kuru çaya tekabül eder. Demleme süresi: 15-20 dk.</p>
        </div>
    </div>
    <?php
}
