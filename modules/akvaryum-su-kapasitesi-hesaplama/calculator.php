<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akvaryum_su_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akvaryum-su-kapasitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/akvaryum-su-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akvaryum-su-kapasitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/akvaryum-su-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aquarium">
        <h3>Akvaryum Su Kapasitesi</h3>
        <div class="hc-form-group">
            <label for="hc-aq-w">Genişlik (cm)</label>
            <input type="number" id="hc-aq-w" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-aq-d">Derinlik (cm)</label>
            <input type="number" id="hc-aq-d" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-aq-h">Yükseklik (cm)</label>
            <input type="number" id="hc-aq-h" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-aq-safety">Üst Boşluk Payı (cm)</label>
            <input type="number" id="hc-aq-safety" value="5">
        </div>
        <button class="hc-btn" onclick="hcAkvaryumSuKapasitesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aq-result">
            <div class="hc-result-label">Net Su Kapasitesi:</div>
            <div class="hc-result-value" id="hc-aq-val">-</div>
        </div>
    </div>
    <?php
}
