<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sut_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sut-verimi',
        HC_PLUGIN_URL . 'modules/sut-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sut-verimi-css',
        HC_PLUGIN_URL . 'modules/sut-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sut-verimi">
        <h3>Hayvan Süt Verimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sv-total">Toplam Süt Miktarı (Litre):</label>
            <input type="number" id="hc-sv-total" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-sv-count">Sağılan Hayvan Sayısı:</label>
            <input type="number" id="hc-sv-count" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcSutVerimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sut-verimi-result">
            <strong>Hayvan Başına Ortalama Verim:</strong>
            <div id="hc-sv-res-val" class="hc-result-value">-</div>
            <span>Litre / Gün</span>
        </div>
    </div>
    <?php
}
