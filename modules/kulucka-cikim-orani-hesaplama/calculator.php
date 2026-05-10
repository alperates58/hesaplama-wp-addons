<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kulucka_cikim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kulucka-verim',
        HC_PLUGIN_URL . 'modules/kulucka-cikim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kulucka-verim-css',
        HC_PLUGIN_URL . 'modules/kulucka-cikim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kulucka-verim">
        <h3>Kuluçka Çıkım Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-kc-total">Makineye Konulan Yumurta:</label>
            <input type="number" id="hc-kc-total" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-kc-hatched">Çıkan Civciv Sayısı:</label>
            <input type="number" id="hc-kc-hatched" placeholder="85">
        </div>
        <button class="hc-btn" onclick="hcKuluckaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kulucka-verim-result">
            <strong>Çıkım Oranı:</strong>
            <div id="hc-kc-res-val" class="hc-result-value">-</div>
            <span>%</span>
        </div>
    </div>
    <?php
}
