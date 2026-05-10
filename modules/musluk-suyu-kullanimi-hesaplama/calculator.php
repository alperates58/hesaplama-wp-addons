<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_musluk_suyu_kullanimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-musluk-suyu-kullanimi-hesaplama',
        HC_PLUGIN_URL . 'modules/musluk-suyu-kullanimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-musluk-suyu-kullanimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/musluk-suyu-kullanimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tap-water">
        <h3>Musluk Suyu İsrafı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tw-type">Durum</label>
            <select id="hc-tw-type">
                <option value="6">Damlatan Musluk (Yavaş) - ~6 L/gün</option>
                <option value="20">Damlatan Musluk (Hızlı) - ~20 L/gün</option>
                <option value="540">Açık Unutulan Musluk (1 saat) - ~540 L</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tw-duration">Süre (Gün / Adet)</label>
            <input type="number" id="hc-tw-duration" value="1">
        </div>
        <button class="hc-btn" onclick="hcMuslukSuyuKullanımıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tw-result">
            <div class="hc-result-label">Toplam Su İsrafı:</div>
            <div class="hc-result-value" id="hc-tw-val">-</div>
            <p id="hc-tw-cost" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
