<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zar_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dice-prob',
        HC_PLUGIN_URL . 'modules/zar-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dice-prob-css',
        HC_PLUGIN_URL . 'modules/zar-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dice-prob">
        <h3>Zar Olasılığı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-dp-count">Zar Sayısı (Max 5)</label>
            <input type="number" id="hc-dp-count" value="2" min="1" max="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-dp-target">Hedef Toplam</label>
            <input type="number" id="hc-dp-target" value="7" min="1">
        </div>
        <button class="hc-btn" onclick="hcDiceProbHesapla()">Olasılığı Hesapla</button>
        <div class="hc-result" id="hc-dice-prob-result">
            <div class="hc-result-item">
                <span>Olasılık:</span>
                <span class="hc-result-value" id="hc-res-dp-val">%0</span>
            </div>
            <p class="hc-dp-note">Not: Bu hesaplama standart 6 yüzlü zarlar için geçerlidir.</p>
        </div>
    </div>
    <?php
}
