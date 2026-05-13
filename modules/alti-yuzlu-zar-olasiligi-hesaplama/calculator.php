<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alti_yuzlu_zar_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alti-yuzlu-zar-olasiligi-hesaplama',
        HC_PLUGIN_URL . 'modules/alti-yuzlu-zar-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alti-yuzlu-zar-olasiligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alti-yuzlu-zar-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dice-calc">
        <h3>Altı Yüzlü Zar Olasılığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dice-n">Zar Sayısı:</label>
            <input type="number" id="hc-dice-n" class="hc-input" value="1" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-dice-sum">Hedeflenen Toplam Değer:</label>
            <input type="number" id="hc-dice-sum" class="hc-input" placeholder="Örn: 6">
        </div>
        <button class="hc-btn" onclick="hcDiceHesapla()">Olasılık Hesapla</button>
        <div class="hc-result" id="hc-alti-yuzlu-zar-olasiligi-hesaplama-result">
            <div class="hc-result-label">Geliş Olasılığı:</div>
            <div class="hc-result-value" id="hc-res-dice-val">-</div>
            <p id="hc-dice-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
