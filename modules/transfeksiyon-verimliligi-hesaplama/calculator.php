<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transfeksiyon_verimliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trans-eff',
        HC_PLUGIN_URL . 'modules/transfeksiyon-verimliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trans-eff-css',
        HC_PLUGIN_URL . 'modules/transfeksiyon-verimliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-trans-eff">
        <h3>Transfeksiyon Verimliliği</h3>
        <div class="hc-form-group">
            <label for="hc-te-positive">Pozitif (Transfekte) Hücre Sayısı:</label>
            <input type="number" id="hc-te-positive" placeholder="300">
        </div>
        <div class="hc-form-group">
            <label for="hc-te-total">Toplam Hücre Sayısı:</label>
            <input type="number" id="hc-te-total" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcTransEffHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-trans-eff-result">
            <strong>Verimlilik:</strong>
            <div id="hc-te-res-val" class="hc-result-value">-</div>
            <span>%</span>
        </div>
    </div>
    <?php
}
