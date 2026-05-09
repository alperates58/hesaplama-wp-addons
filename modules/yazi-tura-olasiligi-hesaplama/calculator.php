<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yazi_tura_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coin-prob',
        HC_PLUGIN_URL . 'modules/yazi-tura-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coin-prob-css',
        HC_PLUGIN_URL . 'modules/yazi-tura-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coin-prob">
        <h3>Binom Yazı Tura Olasılığı</h3>
        <div class="hc-form-group">
            <label for="hc-cp-total">Toplam Atış Sayısı (n)</label>
            <input type="number" id="hc-cp-total" value="10" min="1" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-target">Hedeflenen Yazı Sayısı (k)</label>
            <input type="number" id="hc-cp-target" value="5" min="0">
        </div>
        <button class="hc-btn" onclick="hcCoinProbHesapla()">Olasılığı Hesapla</button>
        <div class="hc-result" id="hc-coin-prob-result">
            <div class="hc-result-item">
                <span>Olasılık:</span>
                <span class="hc-result-value" id="hc-res-cp-val">%0</span>
            </div>
            <p class="hc-cp-note">Örn: 10 atışta tam olarak 5 kez Yazı gelme olasılığı.</p>
        </div>
    </div>
    <?php
}
