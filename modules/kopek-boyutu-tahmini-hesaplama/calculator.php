<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_boyutu_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-boyut',
        HC_PLUGIN_URL . 'modules/kopek-boyutu-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-boyut-css',
        HC_PLUGIN_URL . 'modules/kopek-boyutu-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-boyut">
        <h3>Köpek Yetişkin Boyut Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-kbt-weight">Mevcut Ağırlık (kg):</label>
            <input type="number" id="hc-kbt-weight" step="0.1" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-kbt-age">Yaş (Hafta):</label>
            <input type="number" id="hc-kbt-age" min="1" max="52" placeholder="12">
        </div>
        <div class="hc-form-group">
            <label for="hc-kbt-size">Irk Boyutu:</label>
            <select id="hc-kbt-size">
                <option value="52">Küçük Irk (Yetişkinlik: 12 ay)</option>
                <option value="52">Orta Irk (Yetişkinlik: 12 ay)</option>
                <option value="78">Büyük Irk (Yetişkinlik: 18 ay)</option>
                <option value="104">Dev Irk (Yetişkinlik: 24 ay)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKopekBoyutHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-boyut-result">
            <strong>Tahmini Yetişkin Ağırlığı:</strong>
            <div id="hc-kbt-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
