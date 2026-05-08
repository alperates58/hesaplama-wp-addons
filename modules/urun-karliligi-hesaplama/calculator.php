<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_urun_karliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-urun-karliligi-hesaplama',
        HC_PLUGIN_URL . 'modules/urun-karliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-urun-karliligi-css',
        HC_PLUGIN_URL . 'modules/urun-karliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-urun-karliligi-hesaplama">
        <h3>Ürün Karlılığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-uk-cost">Birim Alış Maliyeti (TL)</label>
            <input type="number" id="hc-uk-cost" placeholder="Örn: 200">
        </div>

        <div class="hc-form-group">
            <label for="hc-uk-price">Birim Satış Fiyatı (TL)</label>
            <input type="number" id="hc-uk-price" placeholder="Örn: 300">
        </div>
        
        <button class="hc-btn" onclick="hcUrunKarlilikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-urun-karliligi-result">
            <div class="hc-result-item">
                <span>Brüt Kâr Tutarı:</span>
                <strong id="hc-uk-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kâr Marjı (Margin):</span>
                <strong id="hc-uk-res-margin">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Mark-up Oranı:</span>
                <strong id="hc-uk-res-markup">-</strong>
            </div>
            <div class="hc-result-value" id="hc-uk-res-main">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Birim Başına Net Kazanç</p>
        </div>
    </div>
    <?php
}
