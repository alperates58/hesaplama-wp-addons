<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_menu_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-menu-pricing-js',
        HC_PLUGIN_URL . 'modules/menu-fiyatı-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-menu-pricing-css',
        HC_PLUGIN_URL . 'modules/menu-fiyatı-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-menu-pricing">
        <h3>Menü Fiyatı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mf-cost">Toplam Malzeme Maliyeti (₺)</label>
            <input type="number" id="hc-mf-cost" value="100" step="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-mf-overhead">İşletme Gideri Oranı (%)</label>
            <input type="number" id="hc-mf-overhead" value="25" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mf-profit">Hedef Kâr Marjı (%)</label>
            <input type="number" id="hc-mf-profit" value="40" step="1">
        </div>

        <button class="hc-btn" onclick="hcMenuFiyatiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-menu-pricing-result">
            <div class="hc-result-item">
                <span>Önerilen Satış Fiyatı:</span>
                <strong class="hc-result-value" id="hc-mf-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: (Maliyet) / (1 - (Gider + Kâr) / 100) formülü baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
