<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olgunluk_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olgunluk-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/olgunluk-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olgunluk-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/olgunluk-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maturity-number">
        <h3>Olgunluk Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mn-name">Tam Adınız (Kimlikteki):</label>
            <input type="text" id="hc-mn-name" class="hc-input" placeholder="Ad Soyad">
        </div>
        <div class="hc-form-group">
            <label for="hc-mn-date">Doğum Tarihiniz:</label>
            <input type="date" id="hc-mn-date" class="hc-input" value="1990-01-01">
        </div>
        <button class="hc-btn" onclick="hcOlgunlukSayisiHesapla()">Olgunluk Sayısını Hesapla</button>
        <div class="hc-result" id="hc-maturity-number-result">
            <div class="hc-mn-val" id="hc-mn-val">-</div>
            <div id="hc-mn-desc" class="hc-mn-desc"></div>
        </div>
    </div>
    <?php
}
