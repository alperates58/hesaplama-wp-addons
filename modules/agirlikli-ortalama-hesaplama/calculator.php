<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlikli_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-w-avg-calc',
        HC_PLUGIN_URL . 'modules/agirlikli-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-w-avg-calc-css',
        HC_PLUGIN_URL . 'modules/agirlikli-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-w-avg">
        <h3>Ağırlıklı Ortalama Hesaplama</h3>
        
        <div id="hc-wa-rows">
            <div class="hc-wa-row">
                <input type="number" placeholder="Değer (x)" class="hc-wa-val" step="any">
                <input type="number" placeholder="Ağırlık (w)" class="hc-wa-weight" step="any">
            </div>
            <div class="hc-wa-row">
                <input type="number" placeholder="Değer (x)" class="hc-wa-val" step="any">
                <input type="number" placeholder="Ağırlık (w)" class="hc-wa-weight" step="any">
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcWaSatirEkle()">+ Veri Ekle</button>
        <button class="hc-btn" onclick="hcWaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wa-result">
            <div class="hc-result-item">
                <span>Ağırlıklı Ortalama:</span>
                <span class="hc-result-value highlight" id="hc-res-wa-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Ağırlık:</span>
                <span class="hc-result-value" id="hc-res-wa-total-w">-</span>
            </div>
        </div>
    </div>
    <?php
}
