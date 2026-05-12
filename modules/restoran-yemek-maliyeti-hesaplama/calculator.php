<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_restoran_yemek_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rest-food-cost-js',
        HC_PLUGIN_URL . 'modules/restoran-yemek-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rest-food-cost-css',
        HC_PLUGIN_URL . 'modules/restoran-yemek-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rest-food-cost">
        <h3>Yemek Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ry-cost">Toplam Malzeme Maliyeti (₺)</label>
            <input type="number" id="hc-ry-cost" value="500" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-ry-waste">Zayiat / Atık Oranı (%)</label>
            <input type="number" id="hc-ry-waste" value="10" min="0" max="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-ry-yield">Porsiyon Sayısı</label>
            <input type="number" id="hc-ry-yield" value="10" min="1">
        </div>

        <button class="hc-btn" onclick="hcYemekMaliyetiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rest-food-cost-result">
            <div class="hc-result-item">
                <span>Porsiyon Başı Maliyet:</span>
                <strong class="hc-result-value" id="hc-ry-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: (Maliyet / (1 - Zayiat Oranı)) / Porsiyon Sayısı.</div>
        </div>
    </div>
    <?php
}
