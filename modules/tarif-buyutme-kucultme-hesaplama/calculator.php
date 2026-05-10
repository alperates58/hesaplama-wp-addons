<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarif_buyutme_kucultme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-recipe-scaler',
        HC_PLUGIN_URL . 'modules/tarif-buyutme-kucultme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-recipe-scaler-calc">
        <h3>Tarif Ölçeklendirme</h3>
        <div class="hc-form-group">
            <label for="hc-rs-orig">Mevcut Porsiyon (Kişilik):</label>
            <input type="number" id="hc-rs-orig" value="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-target">Hedef Porsiyon (Kişilik):</label>
            <input type="number" id="hc-rs-target" value="6">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-amount">Bir Malzemenin Miktarı:</label>
            <input type="number" id="hc-rs-amount" placeholder="250">
        </div>
        <button class="hc-btn" onclick="hcRecipeScalerHesapla()">Yeni Ölçüyü Bul</button>
        <div class="hc-result" id="hc-recipe-scaler-result">
            <strong>Yeni Miktar:</strong>
            <div id="hc-rs-res" class="hc-result-value">-</div>
            <p id="hc-rs-info"></p>
        </div>
    </div>
    <?php
}
