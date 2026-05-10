<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayakkabi_numarasi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ayakkabi-numarasi-donusturme-hesaplama',
        HC_PLUGIN_URL . 'modules/ayakkabi-numarasi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ayakkabi-numarasi-donusturme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ayakkabi-numarasi-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shoe-conv">
        <h3>Ayakkabı Numarası Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-sc-gender">Cinsiyet</label>
            <select id="hc-sc-gender">
                <option value="male">Erkek / Unisex</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-eu">Türkiye (EU) Numarası</label>
            <input type="number" id="hc-sc-eu" placeholder="Örn: 42" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcAyakkabıNumarasıDönüştürmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-sc-result">
            <div id="hc-sc-res-list" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
