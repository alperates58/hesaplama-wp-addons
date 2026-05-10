<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_mama_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-mama',
        HC_PLUGIN_URL . 'modules/kopek-mama-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-mama-css',
        HC_PLUGIN_URL . 'modules/kopek-mama-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-mama">
        <h3>Köpek Mama Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kmm-kcal">Köpeğin Günlük Kalori İhtiyacı (kcal):</label>
            <input type="number" id="hc-kmm-kcal" placeholder="500">
            <small>Bilmiyorsanız "Köpek Kalori İhtiyacı" modülünü kullanın.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-kmm-food">Mamanın Enerji Değeri (kcal / kg):</label>
            <input type="number" id="hc-kmm-food" placeholder="3800">
            <small>Mama paketinin arkasında yazar.</small>
        </div>
        <button class="hc-btn" onclick="hcKopekMamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-mama-result">
            <strong>Günlük Mama Miktarı:</strong>
            <div id="hc-kmm-res-val" class="hc-result-value">-</div>
            <span>gram / gün</span>
        </div>
    </div>
    <?php
}
