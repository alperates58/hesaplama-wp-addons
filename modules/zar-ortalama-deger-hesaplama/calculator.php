<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zar_ortalama_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dice-avg',
        HC_PLUGIN_URL . 'modules/zar-ortalama-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dice-avg-css',
        HC_PLUGIN_URL . 'modules/zar-ortalama-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dice-avg">
        <h3>Zar Ortalama Değer</h3>
        <div class="hc-form-group">
            <label for="hc-da-count">Zar Sayısı</label>
            <input type="number" id="hc-da-count" value="1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-da-sides">Yüzey Sayısı</label>
            <input type="number" id="hc-da-sides" value="6" min="2">
        </div>
        <button class="hc-btn" onclick="hcDiceAvgHesapla()">Ortalamayı Hesapla</button>
        <div class="hc-result" id="hc-dice-avg-result">
            <div class="hc-result-item">
                <span>Beklenen Değer (EV):</span>
                <span class="hc-result-value" id="hc-res-da-val">0</span>
            </div>
            <p class="hc-da-note">Beklenen değer, uzun vadede yapılacak atışların ortalamasını temsil eder.</p>
        </div>
    </div>
    <?php
}
