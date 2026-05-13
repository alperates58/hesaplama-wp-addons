<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ondalik_sayi_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ondalik-sayi-siralama-hesaplama',
        HC_PLUGIN_URL . 'modules/ondalik-sayi-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ondalik-sayi-siralama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ondalik-sayi-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ondalik-sayi-siralama-hesaplama">
        <h3>Ondalık Sayı Sıralama</h3>
        <p>Sayıları ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-os-data">Sayılar</label>
            <textarea id="hc-os-data" rows="4" placeholder="1.2, 5.5, 0.3, 10.1"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-os-order">Sıralama Düzeni</label>
            <select id="hc-os-order">
                <option value="asc">Küçükten Büyüğe (Artan)</option>
                <option value="desc">Büyükten Küçüğe (Azalan)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOndalikSiralamaHesapla()">Sırala</button>
        <div class="hc-result" id="hc-ondalik-sayi-siralama-hesaplama-result">
            <span class="hc-label">Sıralanmış Sonuç:</span>
            <div id="hc-os-res-content" class="hc-os-res"></div>
        </div>
    </div>
    <?php
}
