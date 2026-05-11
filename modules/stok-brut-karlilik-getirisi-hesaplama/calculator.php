<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stok_brut_karlilik_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stok-brut-karlilik-getirisi-hesaplama',
        HC_PLUGIN_URL . 'modules/stok-brut-karlilik-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stok-brut-karlilik-getirisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/stok-brut-karlilik-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stok-brut-karlilik-getirisi">
        <h3>Stok Brüt Karlılık Getirisi (GMROI)</h3>
        <div class="hc-form-group">
            <label for="hc-gmroi-profit">Yıllık Toplam Brüt Kâr (₺)</label>
            <input type="number" id="hc-gmroi-profit" placeholder="Örn: 200.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmroi-inventory">Ortalama Stok Maliyeti (₺)</label>
            <input type="number" id="hc-gmroi-inventory" placeholder="Örn: 50.000">
        </div>
        <button class="hc-btn" onclick="hcGmroiHesapla()">GMROI Hesapla</button>
        <div class="hc-result" id="hc-gmroi-result">
            <div class="hc-result-item">
                <span>Stok Brüt Karlılık Getirisi (GMROI):</span>
                <strong class="hc-result-value" id="hc-gmroi-value">-</strong>
            </div>
            <p id="hc-gmroi-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
